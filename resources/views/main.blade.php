<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link href="{{ asset('/css/webly.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/theme.css') }}" rel="stylesheet" id="skin-default">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="nk-body bg-lighter ">
    <div class="nk-app-root">
        <div class="nk-wrap ">
            <div class="nk-header is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap pb-0">
                        <div class="nk-header-brand">
                            <img src="{{ asset('/images/logo.png') }}" width="80">
                        </div>
                        <div class="nk-header-menu ml-auto" data-content="headerNav">
                            <ul class="nk-menu nk-menu-main ui-s2">
                                <li class="nk-menu-item">
                                    <a href="/registration-form" class="nk-menu-link">
                                        <span class="nk-menu-text">Registration Form/Application Form</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/membership-form" class="nk-menu-link">
                                        <span class="nk-menu-text">Membership Form</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/presentation-form" class="nk-menu-link">
                                        <span class="nk-menu-text">Presentation Form</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/fellowship-registration-form" class="nk-menu-link">
                                        <span class="nk-menu-text">Fellowship Registration Form</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-header-wrap -->
                </div><!-- .container-fliud -->
            </div>
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @yield('content')
                            <div class="modal fade" id="imageEditorModal" tabindex="-1" role="dialog"
                                aria-labelledby="imageEditorModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageEditorModalLabel">Image Editor</h5>
                                        </div>
                                        <div class="modal-body">
                                            <input type="file" class="form-control" id="uploadInput"
                                                accept="image/*">
                                            <div id="canvas-container">
                                                <canvas id="canvas" width="200" height="200"></canvas>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {{-- <input type="button" class="btn btn-primary" id="zoomInBtn" value="Zoom In">
                                            <input type="button" class="btn btn-primary" id="zoomOutBtn" value="Zoom Out"> --}}
                                            <input type="button" class="btn btn-primary" id="saveBtn" value="Upload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-footer bg-white">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright mx-auto"> © 2024 ... Designed &amp; Developed By <a
                                href="https://www.weblytechnolab.com">Webly Technolab</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="{{ asset('/js/bundle.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>
    <script src="{{ asset('/js/scripts.js') }}"></script>
    <script>
        if ($('[name="txn_id"]').length != 0) {
            $('button').attr('disabled', true)
        }
        $('[name="txn_id"]').on('keyup', function() {
            if ($(this).val().length == 0) {
                $('button').attr('disabled', true)
            } else {
                $('button').attr('disabled', false)
            }
        })
        document.getElementsByClassName('preview_image')[0].style.display = 'none';
        document.addEventListener('DOMContentLoaded', () => {
            const canvas = new fabric.Canvas('canvas');
            let uploadedImage;
            let zoomLevel = 1;

            document.getElementById('uploadInput').addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (!file) return;

                fabric.Image.fromURL(URL.createObjectURL(file), (img) => {
                    const maxWidth = 250; // Maximum width of the canvas
                    const maxHeight = 250; // Maximum height of the canvas
                    const ratio = Math.min(maxWidth / img.width, maxHeight / img.height);

                    uploadedImage = img.set({
                        scaleX: ratio,
                        scaleY: ratio,
                        left: (maxWidth - img.width * ratio) / 2,
                        top: (maxHeight - img.height * ratio) / 2,
                    });
                    canvas.clear().add(uploadedImage);
                });
            });

            document.getElementById('saveBtn').addEventListener('click', () => {
                if (uploadedImage) {
                    const editedImageData = canvas.toDataURL({
                        format: 'jpeg',
                        quality: 0.8
                    });
                    document.getElementById('editedImageData').value = editedImageData;
                    document.getElementsByClassName('preview_image')[0].src = editedImageData;
                    document.getElementsByClassName('preview_image')[0].style.display = 'inline';
                    $('#imageEditorModal').modal('hide');
                }
            });

            // document.getElementById('zoomInBtn').addEventListener('click', () => {
            //     if (uploadedImage) {
            //         zoomLevel += 0.1;
            //         uploadedImage.scaleX = uploadedImage.scaleY = zoomLevel;
            //         canvas.renderAll();
            //     }
            // });

            // document.getElementById('zoomOutBtn').addEventListener('click', () => {
            //     if (uploadedImage) {
            //         zoomLevel -= 0.1;
            //         uploadedImage.scaleX = uploadedImage.scaleY = zoomLevel;
            //         canvas.renderAll();
            //     }
            // });
        });
    </script>
</body>

</html>
