<!-- Button trigger modal -->


<!-- Modal -->

<form action="" method="POST" id="article_update_form">
    <div class="modal fade" id="article_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title_update" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title_update" placeholder="Title"
                            name="title_update">
                    </div>

                    <div class="mb-3">
                        <label for="content_update" class="form-label">Content</label>
                        <input type="text" class="form-control" id="content_update" placeholder="Content . . ."
                            name="content_update">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
