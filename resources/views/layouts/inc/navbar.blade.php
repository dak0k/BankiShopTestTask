<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Test Task</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/" target="_blank">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" target="_blank" data-bs-toggle="dropdown" aria-expanded="false">
              Images
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="upload-image">Image upload</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/api/images">API {GET} Images </a></li>
              <li><a class="dropdown-item" href="/api/images/1">API {GET} Images/{id} </a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>