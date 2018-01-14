<ul class="slides">
    <input type="radio" name="radio-btn" id="img-1" checked />
    <li class="slide-container">
      <div class="slide">
        <img src="{{$mobil->depan}}" alt="{{$mobil->model}}" class="img-responsive" />
      </div>
      <div class="nav">
        <label for="img-6" class="prev label">&#x2039;</label>
        <label for="img-2" class="next label">&#x203a;</label>
      </div>
    </li>

    <input type="radio" name="radio-btn" id="img-2" />
    <li class="slide-container">
      <div class="slide">
        <img src="{{$mobil->samping}}" alt="{{$mobil->model}}" class="img-responsive" />
      </div>
      <div class="nav">
        <label for="img-1" class="prev label">&#x2039;</label>
        <label for="img-3" class="next label">&#x203a;</label>
      </div>
    </li>

    <input type="radio" name="radio-btn" id="img-3" />
    <li class="slide-container">
      <div class="slide">
        <img src="{{$mobil->belakang}}" alt="{{$mobil->model}}" class="img-responsive" />
      </div>
      <div class="nav">
        <label for="img-2" class="prev label">&#x2039;</label>
        <label for="img-4" class="next label">&#x203a;</label>
      </div>
    </li>
    
</ul>