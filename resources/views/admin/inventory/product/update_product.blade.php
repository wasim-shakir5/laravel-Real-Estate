<!-- Modal -->
<div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateProductForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="update_name">Product Name</label>
                        <input type="text" name="name" id="update_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="update_category">Category</label>
                        <select class="form-control" id="update_category" name="category">
                            <option value="">Choose Category</option>
                            <option value="computers">Computers</option>
                            <option value="laptop">Laptop</option>
                            <option value="mobiles">Mobiles</option>
                            <option value="headphones">Headphones</option>
                        </select>
                    </div>
                    <!-- Add other fields similarly -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#updateProductForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var productId = $('#product_id').val();

            $.ajax({
                url: '/admin/inventory/update-product/' + productId,
                type: 'POST',
                data: formData,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Updated Successfully',
                    }).then(function() {
                        location.reload();
                    });
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error updating product',
                        text: response.responseJSON.message,
                    });
                }
            });
        });
    });
</script>
