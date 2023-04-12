<script>
    var listCategory =''
    var listSupplier = ''
    function showProduct() {
        $.ajax({
            url: "{{ route('user.products.index') }}" + `?category=${listCategory}&supplier=${listSupplier}`,
            type: 'GET',
            success: function(result) {
                console.log(result)

                $('#pagination').pagination({
                    dataSource: result,
                    pageSize: 9,
                    formatResult: function(data) {

                    },
                    callback: function(list, pagination) {
                        var inner = ''
                        list.forEach(element => {
                            inner += `<div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="/product-detail/${element.slug}">
                                                <img class="default-img object-fit-cover" src="${element.image}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <span href="shop.html">${element.category.name}</span>
                                        </div>
                                        <h2>
                                            <a href="/product-detail/${element.slug}">${element.name}</a>
                                        </h2>
                                        <div class="product-price">
                                            <span>${ Intl.NumberFormat('en-VN').format(element.price) }</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Yêu thích" class="action-btn hover-up" href=""><i class="fi-rs-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>` 

                        });
                        $('.products').empty()
                        $('.products').append(inner)
                    }
                })
            },
            error: function(error) {
                console.log('www', error);
            }
        })
    }
    showProduct()
    $(document).on('change', '.supplier', function() {
        listSupplier = ''
        let i = 0;
        $(".supplier:checked").each(function() {
            if (i == 0) {
                listSupplier += $(this).val()
                i++;
            } else
                listSupplier += "-" + $(this).val()
        });
        console.log(listSupplier)
        showProduct()
    })
    $(document).on('change', '.category', function() {
        listCategory = ''
        let i = 0;
        $(".category:checked").each(function() {
            if (i == 0) {
                listCategory += $(this).val()
                i++;
            } else
                listCategory += "-" + $(this).val()

        });
        console.log(listCategory)
        showProduct()
    })
</script>
