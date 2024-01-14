
$( document ).ready(function() {
    // Handler for .ready() called.
    // submission forms
    $("#order-form").on('submit', function (e) {
      e.preventDefault(); // prevent the default functionality of form submission. forms automatically reload when they submit.
      
      // serialize gets the name of the fiels.
      console.log($("#order-form").serialize());
      var formData = $("#order-form").serialize();

      // sned that data to the process page
      // AJAX
      // this is a method call, passing an object as a parameter
      $.ajax({
        type : 'POST',
        url  : 'process.php',
        data: {
          action : 'order-add',  
          formData : formData,
        },
        success : function (output) {
          console.log(output); 

          var outputObj = JSON.parse(output);
          if(outputObj.response == "success"){
            $("#receipt-container").show();
            let data = outputObj.data;
            var html = `
                      <h3 class="p-3 text-center">Customer Receipt</h3>
                      <section>
                        <div class="d-flex gap-3 justify-content-between">
                          <div class="person-info">
                            <ul class="no-list-style-type">
                              <li><b>Sold to:</b> ${data.ordered_by}</li>
                              <li><b>Email:</b> ${data.email}</li>
                              <li><b>Phone:</b> ${data.phone}</li>
                              <li><b>Address:</b> ${data.address}, ${data.city}, ${data.province}, ${data.postcode}</li>
                            </ul>
                          </div>
                          <div class="credit-info">
                            <ul class="no-list-style-type">
                              <li><b>Credit Number:</b> ${data.cred_num}</li>
                              <li><b>Credit Expiry:</b> ${data.cred_month}/${data.cred_year}</li>
                            </ul>
                          </div>
                        </div>

                      </section>
                      <section>
                        <table id="managers-list" class="table">
                          <thead>
                            <tr>
                              <th class="text-center" scope="col">Quantity</th>
                              <th class="text-start" scope="col">Description</th>
                              <th class="text-end" scope="col">Unit Price</th>
                              <th class="text-end" scope="col">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            ${data.products.map(row => `
                            <tr>
                                <td class="text-center">${row.qty}</td>
                                <td class="text-start">${row.name}</td>
                                <td class="text-end">$${row.unit_price.toFixed(2)}</td>
                                <td class="text-end">$${row.total_price.toFixed(2)}</td>
                            </tr>
                            `).join('')}
                          </tbody>
                        </table>
                        <div class="justify-content-end">
                            <div class="total">
                              <p class="m-0"><b>Subtotal:</b> $${data.subtotal.toFixed(2)}</p>
                              <p class="m-0"><b>Sales Tax (${(data.tax_rate * 100).toFixed(2)}%):</b> $${data.sales_tax.toFixed(2)}</p>
                              <p class="m-0"><b>Grand Total: $${data.grand_total.toFixed(2)}</b></p>
                            </div>
                        </div>  
                      </section>
                      <p class="m-0 pt-5 text-center"> Thank you for shopping with us!</p>
                        `;

            $("div#receipt").html(html);
            $("#receipt-container").siblings(".alert-danger").hide();
            $("#receipt-container").siblings(".alert-success").show();
          } else {
            $("#receipt-container").siblings(".alert-success").hide();
            $("#receipt-container").siblings(".alert-danger").show();
          }
        }
      });

    });

    $("#manager-form").on("submit", function (e) {
      e.preventDefault(); // prevent the default functionality of form submission. forms automatically reload when they submit.
    
      // serialize gets the name of the fiels.
      console.log($("#manager-form").serialize());
      var formData = $("#manager-form").serialize();

      // sned that data to the process page
      // AJAX
      $.ajax({
        type : 'POST',
        url  : 'process.php',
        data: {
          action : 'manager-add',  
          formData : formData,
        },
        success : function (output) {
          var outDeserialized = JSON.parse(output);
          if (outDeserialized.response == "success") {
            $("div#manager-form-container > div.alert-failed").hide();
            $("div#manager-form-container > div.alert-success").show();
            displayManagerList();
          } else {
            $("div#manager-form-container > div.alert-success").hide();
            $("div#manager-form-container > div.alert-failed").show();
          }
        }
      });
    });

});

function displayManagerList () {
  $.ajax({
    type : 'POST',
    url  : 'process.php',
    data: {
      action : 'manager-retrieve',  
    },
    success : function (output) {
      let outDeserialized = JSON.parse(output);
      let list = outDeserialized;

      $('#managers-list tbody').empty(); // duplicate items are being displayed so decided to clear the contents first.
     
      // how to display tables source: https://stackoverflow.com/questions/39181169/displaying-table-view-dynamically-using-jquery
      $.each(list, function () {
        $("<tr>").append($("<td>").append(`${this.fname} ${this.lname}`))
          .append($("<td>").append(this.email))
          .append($("<td>").append(this.aclvl_name))
        .appendTo('table#managers-list tbody');
      });
    }
  });
}

function displayOrdersList () {
  $.ajax({
    type : 'POST',
    url  : 'process.php',
    data: {
      action : 'order-retrieve',  
    },
    success : function (output) {
      let outDeserialized = JSON.parse(output);
      let list = outDeserialized;

      $('table#order-list tbody').empty(); // duplicate items are being displayed so decided to clear the contents first.
      // source: https://stackoverflow.com/questions/39181169/displaying-table-view-dynamically-using-jquery
      $.each(list, function () {
        $("<tr>").append($("<td>").append(this.ordered_by))
          .append($("<td>").append(this.email))
          .append($("<td>").append(this.phone))
          .append($("<td>").append(`${this.address}, ${this.city}, ${this.province}, ${this.postcode}`))
          .append($("<td>").append(this.subtotal))
          .append($("<td>").append(this.sales_tax))
          .append($("<td>").append(this.grand_total))
          .append($("<td>").append(this.order_date))
        .appendTo('table#order-list tbody');
      });
    }
  });
}