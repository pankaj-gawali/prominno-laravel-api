<h2>{{ $product->name }}</h2>
<p>{{ $product->description }}</p>

<table border="1" cellspacing="0" cellpadding="5" style="width:100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>Brand Name</th>
            <th>Detail</th>
            <th>Image</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product->brands as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->detail }}</td>
            <td>
                @if($brand->image)
                    <img src="{{ public_path('storage/'.$brand->image) }}" width="100">
                @endif
            </td>
            <td>{{ $brand->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Total Price: {{ $total }}</h3>
