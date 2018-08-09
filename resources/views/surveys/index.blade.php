@extends('welcome')
@section('content')

    <div class="container" id="surveyapp">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Survey Crud View</h2>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                        Create Survey
                    </button>
                </div>
            </div>
        </div>


        <!-- Item Listing -->
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Users Assigned</th>
                <th width="200px">Action</th>
            </tr>
            <tr v-for="survey in surveys">
                <td>@{{ survey.id }}</td>
                <td>@{{ survey.name }}</td>
                <td><p v-for="user in survey.users">@{{ user.name }},</p></td>
                <td>
                    <button class="btn btn-primary" >Edit</button>
                    <button class="btn btn-danger" @click="deleteSurvey(survey.id)">Delete</button>
                </td>
            </tr>
        </table>


        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li :class="[{disabled:!pagination.prev_page}]">
                    <a href="#" aria-label="Previous" @click="fetchSurveys(pagination.prev_page)">
                        <span aria-hidden="true">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link text-dark">@{{pagination.current_page}} of @{{ pagination.last_page }}</a> </li>
                <li :class="[{disabled:!pagination.next_page}]">
                    <a href="#" aria-label="Previous" @click="fetchSurveys(pagination.next_page)">
                    <span aria-hidden="true">Next</span>
                    </a>
                </li>
            </ul>
        </nav>


        <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Survey</h4>
                    </div>
                    <div class="modal-body">


                        <form method="POST" enctype="multipart/form-data">


                            <div class="form-group">
                                <label for="title">Name: </label>
                                <input type="text" name="name" v-model="survey.name" class="form-control" />
                                <span  class="error text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label for="users">Assign Users</label>
                                <div>
                                    <select id="users-select" class="multiselect-ui form-control" v-model="survey.selectedUsers" multiple="multiple">
                                        <option :value="user.id" v-for="user in users">@{{ user.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success" @click.prevent="addSurvey()">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Edit Item Modal -->
        <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
                    </div>
                    <div class="modal-body">


                        <form method="POST" enctype="multipart/form-data">


                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control"  />
                                <span class="error text-danger"></span>
                            </div>


                            <div class="form-group">
                                <label for="title">Description:</label>
                                <textarea name="description" class="form-control"></textarea>
                                <span  class="error text-danger"></span>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>


    </div>





    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@stop
@push('scripts')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endpush