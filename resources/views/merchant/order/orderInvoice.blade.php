<div class="invoice overflow-auto d-none">
    <div style="min-width: 600px">
        <main>
            <div class="row contacts">
                <div class="col invoice-to">
                    <div class="text-gray-light">Order ID : fdsf</div>
                    <h2 class="to"></h2>
                    <div class="address">Phone No: </div>
                    <div class="email"><a href="mailto:john@example.com">Email: </a></div>
                </div>
                <div class="col invoice-details">
                    <h1 class="invoice-id"> <div class="barcode">}</div></h1>
                    <div class="date">Order Date: </div>
                    <div class="date">Delivery Address: </div>
                    <div class="date">Payment Method: </div>
                </div>
            </div>
            <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="text-left">ITEM</th>
                    <th class="text-right">UNIT PRICE</th>
                    <th class="text-right">QUANTITY</th>
                    <th class="text-right">TOTAL</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                        <td class="no"></td>
                        <td class="text-left">
                            <h3></h3>

                        </td>
                        <td class="unit">BDT </td>
                        <td class="qty"></td>
                        <td class="total">BDT </td>
                </tr>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td>BDT </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">DELIVERY COST</td>
                    <td>BDT </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td>BDT</td>
                </tr>
                </tfoot>
            </table>
        </main>
        <footer>
            Invoice was created by <a href="https://aleshasolutions.com/">Alesha Solutions</a>.
        </footer>
    </div>
    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
    <div></div>
</div>

{{--    <button id="printInvoice">Generate PDF</button>--}}
    @push('scripts')

        <script>

            // $(document).ready(function(){
            //     alert(435)
            // });


            // $('#printInvoice').click( () => {
            //     $('.invoice').printThis({
            //         debug: false,               // show the iframe for debugging
            //         importCSS: true,            // import parent page css
            //         importStyle: true,         // import style tags
            //         printContainer: true,       // print outer container/$.selector
            //         loadCSS: "",                // path to additional css file - use an array [] for multiple
            //         pageTitle: 'Order Invoice',              // add title to print page
            //         removeInline: false,        // remove inline styles from print elements
            //         removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
            //         printDelay: 333,            // variable print delay
            //         header: null,               // prefix to html
            //         footer: null,               // postfix to html
            //         base: false,                // preserve the BASE tag or accept a string for the URL
            //         formValues: true,           // preserve input/form values
            //         canvas: false,              // copy canvas content
            //         doctypeString: '',       // enter a different doctype for older markup
            //         removeScripts: false,       // remove script tags from print content
            //         copyTagClasses: false,      // copy classes from the html & body tag
            //         beforePrintEvent: null,     // function for printEvent in iframe
            //         beforePrint: null,          // function called before iframe is filled
            //         afterPrint: null            // function called before iframe is removed
            //     })
            // })
        </script>
    @endpush

