@extends('layout.app')
@section('content')
<div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">comments</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">$7,445</div>
                        <div class="cardName">Earnings</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>

                </div>
            </div>


        <!--data list-->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>
                        Recent Orders
                    </h2>
                    <a href="#" class="btn">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Payment</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Star Refrigerator</td>
                            <td>$1200</td>
                            <td>Paid</td>
                            <td><span class="status delivered">Deliverd</span></td>
                        </tr>
                        <tr>
                            <td>Star2 Refrigerator</td>
                            <td>$1000</td>
                            <td>Due</td>
                            <td><span class="status delivered">Deliverd</span></td>
                        </tr>
                        <tr>
                            <td>Cooler</td>
                            <td>$2500</td>
                            <td>Paid</td>
                            <td><span class="status return">Return</span></td>
                        </tr>
                        <tr>
                            <td>Hp Laptop</td>
                            <td>$320</td>
                            <td>Due</td>
                            <td><span class="status delivered">Deliverd</span></td>
                        </tr>
                        <tr>
                            <td>Apple watch</td>
                            <td>$120</td>
                            <td>Paid</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>shoes</td>
                            <td>$110</td>
                            <td>Due</td>
                            <td><span class="status inprogress">In Progress</span></td>
                        </tr>
                        <tr>
                            <td>Wall fan</td>
                            <td>$120</td>
                            <td>Paid</td>
                            <td><span class="status delivered">Deliverd</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- customers -->

        </div>
<script>
    let home = document.querySelectorAll('.navigation li:nth-child(2)')[0];
    home.classList.add('hovered');
</script>

@endsection