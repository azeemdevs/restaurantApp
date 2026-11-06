<x-app-layout>
    <div class="container">
        <div class="row" id="table-detail"></div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <button class="btn btn-primary btn-md d-block" id="btn-show-tables">View All Tables</button>
                <div id="selected-table"></div>
                <div id="order-detail"></div>
            </div>
            <div class="col-md-7">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($categories as $category)
                            <a href="#" class="nav-item nav-link" data-id="{{ $category->id }}" data-toggle="tab">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </nav>
                <div class="row mt-2" id="list-menu"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Payment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 class="totalAmount"></h3>
                    <h3 class="changeAmount"></h3>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="number" id="received-amount" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="payment">Payment Type</label>
                        <select class="form-select" id="payment-type">
                            <option value="cash">Cash</option>
                            <option value="credit card">Credit Card</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save-payment" disabled>Save Payment</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // By default Hidden
            $("#table-detail").hide();
            $("#btn-show-tables").click(function() {
                // By clicking show tables
                if ($("#table-detail").is(":hidden")) {
                    $.get("/cashier/getTable", function(data) {
                        $("#table-detail").html(data);
                        $("#table-detail").slideDown('fast');
                        $("#btn-show-tables").html('Hide Tables').removeClass('btn-primary')
                            .addClass('btn-danger');
                    });
                } else {
                    $("#table-detail").slideUp('fast');
                    $("#btn-show-tables").html('View All Tables').removeClass('btn-danger').addClass(
                        'btn-primary');
                }
            });
            // Load Data of menu by using Get request Ajax Jquery method
            $(".nav-link").click(function() {
                $.get('/cashier/getMenuByCategory/' + $(this).data('id'), function(data) {
                    $("#list-menu").hide();
                    $('#list-menu').html(data);
                    $('#list-menu').fadeIn('fast');
                });
            });
            // Show Tables on click button
            var SELECTED_TABLE_ID = "";
            var SELECTED_TABLE_NAME = "";
            var SALE_ID = "";
            $("#table-detail").on("click", ".btn-table", function() {
                SELECTED_TABLE_ID = $(this).data("id");
                SELECTED_TABLE_NAME = $(this).data("name");
                $("#selected-table").html('<br><h3>Table: ' + SELECTED_TABLE_NAME + '</h3><hr>');
                $.get("/cashier/getSaleDetailsByTable/" + SELECTED_TABLE_ID, function(data) {
                    $("#order-detail").html(data);
                });
            });
            // Show selected category menu on side table

            $("#list-menu").on("click", ".btn-menu", function() {
                if (SELECTED_TABLE_ID == "") {
                    alert("Please select a table first");
                } else {
                    var menu_id = $(this).data('id');
                    $.ajax({
                        type: "POST",
                        data: {
                            // "_token": $('meta[name="csrf-token"]').attr('content'),
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                            "menu_id": menu_id,
                            "table_id": SELECTED_TABLE_ID,
                            "table_name": SELECTED_TABLE_NAME,
                            "quantity": 1
                        },
                        url: "/cashier/orderFood",
                        success: function(data) {
                            $("#order-detail").html(data);
                        }
                    });

                }
            });
            // Conirm Button
            $("#order-detail").on('click', '.btn-confirm-order', function() {
                var SaleID = $(this).data('id');
                $.ajax({
                    type: "POST",
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "sale_id": SaleID

                    },
                    url: "/cashier/confirmOrderStatus",
                    success: function(data) {
                        $("#order-detail").html(data);
                    }
                });
            });
            // action on delete status icon  Sale Details

            $("#order-detail").on("click", '.btn-delete-saledetail', function() {
                var saleDetailID = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "saleDetail_id": saleDetailID
                    },
                    url: '/cashier/deleteSaleDetail',
                    success: function(data) {
                        $("#order-detail").html(data);
                    }
                });
            });
            // action for increase quantity
            $("#order-detail").on("click", '.btn-increase-quantity', function() {
                var saleDetailID = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "saleDetail_id": saleDetailID
                    },
                    url: '/cashier/increase-quantity',
                    success: function(data) {
                        $("#order-detail").html(data);
                    }
                });
            });
            // action for decrease quantity
            $("#order-detail").on("click", '.btn-decrease-quantity', function() {
                var saleDetailID = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "saleDetail_id": saleDetailID
                    },
                    url: '/cashier/decrease-quantity',
                    success: function(data) {
                        $("#order-detail").html(data);
                    }
                });
            });
            // When a user click on the payment button
            $("#order-detail").on("click", ".btn-payment", function() {
                var totalAmount = $(this).attr('data-totalAmount');
                $(".totalAmount").html("Total Amount:" + totalAmount);
                $("#received-amount").val('');
                $(".changeAmount").html('');
                SALE_ID = $(this).data('id');
            });
            // Calculate total amount change
            $("#received-amount").keyup(function() {
                var totalAmount = $(".btn-payment").attr('data-totalAmount');
                var receivedAmount = $(this).val();
                var changedAmount = receivedAmount - totalAmount;
                $(".changeAmount").html("Total Change: $" + changedAmount);
                //  checking the cashier enter the right amount, then enable or disable save button


                if (changedAmount >= 0) {
                    $(".btn-save-payment").prop('disabled', false);
                } else {
                    $(".btn-save-payment").prop('disabled', true);

                }
            });
            // save Payement
            $(".btn-save-payment").click(function() {
                var receivedAmount = $("#received-amount").val();
                var paymentType = $("#payment-type").val();
                var saleId = SALE_ID;
                $.ajax({
                    method: 'POST',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        "SALEID": saleId,
                        "received_amount": receivedAmount,
                        "payment_type": paymentType
                    },
                    url: '/cashier/savepayment',
                    success: function(data) {
                        window.location.href = data;
                    }

                });
            });
        });
    </script>
</x-app-layout>
