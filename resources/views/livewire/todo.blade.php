
<section class="vh-100" style="background-color: #e2d5de;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h6 class="mb-3">Awesome Todo List</h6>

                <div class="form-outline flex-fill">
                    <div class="d-flex">
                        <input type="text" id="form3" class="form-control form-control-lg"  wire:model='task' />
                        <button type="submit" class="btn btn-primary btn-lg ms-2" wire:click='addTodo'>Add</button>
                    </div>

                  <label class="form-label" for="form3">What do you need to do today?</label>
                </div>
              <ul class="list-group mb-0">
                @foreach($todos as $todo)
                <li
                  class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                  <div class="d-flex align-items-center">
                    @if($todo->status==1)
                    <input class="form-check-input me-2" type="checkbox" id="markAsDone{{$todo->id}}"  wire:click="markAsDone({{$todo->id}})" />
                    <span>{{$todo->task}}</span>
                  @else
                  <input class="form-check-input me-2" type="checkbox" id='markAsNotDone' wire:change='markAsNotDone({{$todo->id}})' checked/>
                  <span style="text-decoration:line-through">{{$todo->task}}</span>
                  @endif
                </div>
                  <a href="#!" data-mdb-toggle="tooltip" title="Remove item" wire:click='deleteTask({{$todo->id}})'>
                    <i class="fas fa-times text-primary"></i>
                  </a>
                </li>
                @endforeach
              </ul>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
