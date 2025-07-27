<?php


namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('user')->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::with(['user', 'salesRecords.transactions.item'])->findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telp' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:customers,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
        ]);

        $customer = Customer::create([
            'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'fax' => $request->fax,
            'email' => $request->email,
        ]);

        User::create([
            'name' => $request->nama_customer,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'userable_id' => $customer->id_customer,
            'userable_type' => Customer::class,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer created successfully!');
    }

    public function edit($id)
    {
        $customer = Customer::with('user')->findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'nama_customer' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'telp' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:customers,email,' . $id . ',id_customer',
        ]);

        $customer->update($request->only(['nama_customer', 'alamat', 'telp', 'fax', 'email']));

        if ($customer->user) {
            $customer->user->update([
                'name' => $request->nama_customer,
                'email' => $request->email,
            ]);
        }

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        if ($customer->user) {
            $customer->user->delete();
        }
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully!');
    }
}
