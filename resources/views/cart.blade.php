<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/shopping-cart.css') }}?v={{ filemtime(public_path('css/shopping-cart.css')) }}">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang Belanja</h5>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-share-alt"></span> Lanjut belanja
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="cartForm" action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        @foreach($barang as $item)
                            <div class="row">
                                <div class="col-xs-2">
                                    <img class="img-responsive" src="{{ asset('image/' . $item->gambar_barang) }}" alt="Gambar Produk">
                                </div>
                                <div class="col-xs-4">
                                    <h4 class="product-name"><strong>{{ $item->nama_barang }}</strong></h4>
                                    <h4><small>{{ $item->deskripsi_barang }}</small></h4>
                                </div>
                                <div class="col-xs-2">
                                    <h6><strong>Rp. {{ number_format($item->harga_barang, 2) }} <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-xs-2">
                                    <input type="number" class="form-control input-sm quantity-input" name="quantities[{{ $item->id_barang }}]" value="{{ $item->jumlah }}" min="1" required>
                                </div>
                                <div class="col-xs-2">
                                    <button type="button" class="btn btn-link btn-xs remove-item" data-id="{{ $item->id_barang }}">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="row">
                            <div class="col-xs-9">
                                <h6 class="text-right">Perbarui jumlah?</h6>
                            </div>
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-default btn-sm btn-block">Perbarui keranjang</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Total <strong id="total_harga">Rp. {{ number_format($total_harga, 2) }}</strong></h4>
                        </div>
                        <div class="col-xs-3">
                            <form id="checkoutForm" action="{{ route('checkout.showForm') }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-success btn-block">
                                    Checkout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Tampilkan alert jika ada pesan sukses dari session
        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        var form = document.getElementById('cartForm');
        var totalElement = document.getElementById('total_harga');

        form.addEventListener("keydown", function(event) {
            if (event.key === "Enter" && event.target.tagName !== "TEXTAREA") {
                event.preventDefault();
            }
        });

        // Handle remove item button click
        var removeButtons = document.querySelectorAll('.remove-item');
        removeButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var itemId = this.getAttribute('data-id');
                fetch("{{ url('cart/remove') }}/" + itemId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove item from UI
                        this.closest('.row').remove();
                        // Update total price display
                        updateTotal();
                    } else {
                        alert('Gagal menghapus item.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);

                });
            });
        });

        // Function to update total price
        function updateTotal() {
            var totalPrice = 0;
            var items = document.querySelectorAll('.panel-body .row');
            items.forEach(function(item) {
                var priceText = item.querySelector('.col-xs-2 h6 strong').textContent.trim().replace('Rp. ', '').replace(',', '');
                var quantity = item.querySelector('.quantity-input').value;
                totalPrice += parseFloat(priceText) * parseInt(quantity);
            });
            totalElement.textContent = "Rp. " + totalPrice.toFixed(2);
        }

        // Initial call to update total price on page load
        updateTotal();
    });
</script>

</body>
</html>
