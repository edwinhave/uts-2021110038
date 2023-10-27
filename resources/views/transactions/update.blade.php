@extends('layouts.template')

@section('title', 'Add New Transcation')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Transaksi</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('transactions.update') }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" pattern="\d*" class="form-control" id="amount" name="amount"
                        value="{{ old('title', $transaction->amount) }}" placeholder="Nominal">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" aria-label="Default select example" name="type" id="type">
                        <option selected></option>Pilih Menu</option>
                        <option value="Income">Income</option>
                        <option value="Expense">Expense</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" aria-label="Default select example" name="category" id="category">
                        <option selected>Pilih Menu</option>
                        <option value="Wage">Wage</option>
                        <option value="Bonus">Bonus</option>
                        <option value="Gift">Gift</option>
                        <option value="Food">Food & Drink</option>
                        <option value="Shopping">Shopping</option>
                        <option value="Charty">Charty</option>
                        <option value="Housing">Housing</option>
                        <option value="Insurance">Insurance</option>
                        <option value="Taxes">Taxes</option>
                        <option value="Transportation">Transportation</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" rows="10" name="notes">{{ old('notes', $transaction->notes) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success btn-block">Save</button>
            </form>
        </div>
    </div>





    <script>
        // Fungsi untuk menampilkan opsi kategori berdasarkan tipe yang dipilih
        function updateCategoryOptions() {
            var typeSelect = document.getElementById('type');
            var categorySelect = document.getElementById('category');

            // Hapus semua opsi kategori sebelum menambahkan yang baru
            categorySelect.innerHTML = '';

            // Mendapatkan nilai yang dipilih dalam elemen "type"
            var selectedType = typeSelect.value;

            // Daftar opsi kategori berdasarkan tipe yang dipilih
            var categoryOptions = {
                Income: ['Wage', 'Bonus', 'Gift'],
                Expense: ['Food & Drink', 'Shopping', 'Charity', 'Housing', 'Insurance', 'Taxes', 'Transportation']
            };

            if (categoryOptions[selectedType]) {
                // Tambahkan opsi yang sesuai ke elemen "category"
                categoryOptions[selectedType].forEach(function(category) {
                    var option = document.createElement('option');
                    option.value = category;
                    option.textContent = category;
                    categorySelect.appendChild(option);
                });
            } else {
                // Jika tipe tidak sesuai, tampilkan opsi default
                var defaultOption = document.createElement('option');
                defaultOption.selected = true;
                defaultOption.disabled = true;
                defaultOption.textContent = 'Pilih Menu';
                categorySelect.appendChild(defaultOption);
            }
        }

        // Menambahkan event listener untuk memantau perubahan dalam elemen "type"
        document.getElementById('type').addEventListener('change', updateCategoryOptions);

        // Memanggil fungsi pertama kali untuk menginisialisasi opsi kategori
        updateCategoryOptions();
    </script>

@endsection
