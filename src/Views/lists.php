<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url(); ?>/public/fontawesome-free-5.15.4-web/css/all.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4">
  <i class="bi-alarm"></i>
</div>
<div class="col-md-4">
  <div class="col-md-12 m-2">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newListModal">
      New list
    </button>
  </div>
  <div class="col-md-12" id="userLists">
</div>

  
  <?php 
  /*
  if (count($user_lists)) {
    foreach($user_lists as $list){?>
      <div class="card m-1 p-1">
          <h3><?php echo $list->title; ?></h3>
          <p class="m-1">
            <i><?php echo $list->description; ?></i>
            <i class="fas fa-alarm"></i>
          </p>  
</div>
<?php  
}
  }
  
  */?>
</div>
<div class="col-md-4"></div>
</div>
</div>





<!-- New List Modal -->
<div class="modal fade" id="newListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New list</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form name="newList" method="POST" action="<?php echo base_url() . '/list/create'?>">
  <div class="mt-5 mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" id="createListTitle" class="form-control" id="title" aria-describedby="titleHelp">
    <div id="titleHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" name="description" id="createListDescription" class="form-control" id="description1">
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="createListButton" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
<script>
let listsObject = [];
$(document).ready(function () {
    (function () {
        $.ajax({
            url: '<?php echo base_url()?>' + '/user-lists',
            type: 'POST',
            dataType: 'json',
            data: '',
            success: function (result, status, xhr) {
                if(result.data) {
                    createDom(result.data);
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(error);
            }
        });

    })();

    $("#createListButton").click(function () {
        var list = new Object();
        list.title = $('#createListTitle').val();
        list.description = $('#createListDescription').val();

        $.ajax({
            url: '<?php echo base_url()?>' + '/list/create',
            type: 'POST',
            dataType: 'json',
            data: list,
            success: function (result, status, xhr) {
                console.log(result.data);
		            creatDom(result.data);


            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(error);
            }
        });

    });
});


function createDom(model) {
    if(model) {
        for(let id in model) {
            if (!model.hasOwnProperty(id)) {
                break;
            }

            let dom = $('<div>', {
                class: 'card m-1 p-1',
                id: `card-${id}`,
                html: [
                    $('<p>', {
                        text: `${model[id].title}`
                    }),
                    $('<i>', {
                        text: `${model[id].description}`
                    }),
                    $('<div>', {
                        class: 'col-md-12',
                        html: [
                            $('<button>', {
                                class: 'btn btn-danger',
                                text: 'Delete'
                            }),
                            $('<button>', {
                                class: 'btn',
                                text: 'Edit'
                            })
                        ]
                    })
                ]
            });
            listsObject.push(dom);
            dom = null;
        }
        $("#userLists").append(listsObject);
    }
}  
</script>


</body>    
</html>