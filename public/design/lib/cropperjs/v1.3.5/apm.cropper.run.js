var cropperModals = document.getElementsByClassName('cropper-modal');
var cropper;
window.addEventListener('DOMContentLoaded', function () {
    for (var i in cropperModals) {
        if (cropperModals[i].tagName == 'DIV' || cropperModals[i].tagName == 'div') {
            cropModal = cropperModals[i];
            var cropModal_id = cropModal.id;
            $('#' + cropModal_id).on('shown.bs.modal', function () {
               $(this).css('overflow', 'auto');
                var thisCroppedImage_id = $(this).attr('data-target-image');
                var thisCroppedImage = document.getElementById(thisCroppedImage_id);
                var image = this.getElementsByTagName('img')[0];
                var w = thisCroppedImage.getAttribute('data-cropper-width');
                var h = thisCroppedImage.getAttribute('data-cropper-height');
                $('.previews').first().css('width',  thisCroppedImage.getAttribute('data-cropper-preview-width'));
                $('.previews').first().css('height',  thisCroppedImage.getAttribute('data-cropper-preview-height'));
                image.src = thisCroppedImage.getAttribute('data-cropper-original');
                if (cropper != undefined) {
                    cropper.destroy();
                }
                if (true) {
                    cropper = new Cropper(image, {
                        viewMode: 1,
                        aspectRatio: w / h,

                        //minCropBoxWidth: w, minCropBoxHeight: h,
                        //maxCropBoxWidth: w, maxCropBoxHeight: h,
                        //minCanvasWidth: w, minCanvasHeight: h,
                        //maxCanvasWidth: w, maxCanvasHeight: h,
                        //minContainerWidth: w,minContainerHeight: h,
                        //  maxContainerWidth: w,maxContainerHeight: h,
                        // preview: ".preview",
                        preview: ".previews",
                        ready: function () {
                        },
                        crop: function(e) {
                        }
                    });

                } else {
                    cropper.replace(image.src);
                }
              }).on('hidden.bs.modal', function () {

                //if (cropper.getData().x != 0) {
                    var thisCroppedImage_id = $(this).attr('data-target-image');
                    var thisCroppedImage = document.getElementById(thisCroppedImage_id);
                    var croppedFieldData = thisCroppedImage.getAttribute('data-cropper-field-data');
                    //document.getElementById(croppedFieldData).value = '{x:' + cropper.getData(true).x + ',y:' + cropper.getData(true).y + '}';
                    document.getElementById(croppedFieldData).value = JSON.stringify(cropper.getData(true));

                    cropedCanvase = cropper.getCroppedCanvas({width:thisCroppedImage.getAttribute('data-cropper-preview-width'),height:thisCroppedImage.getAttribute('data-cropper-preview-height')});
                    thisCroppedImage.src = cropedCanvase.toDataURL();
                //}
                cropper.destroy();
                //alert(cropper);
              });
        }
    }

    var cropperDivs = document.getElementsByClassName('cropper-div');
    for (var i in cropperDivs) {
        cropDiv = cropperDivs[i];
        if (cropDiv.tagName != undefined) {
            image = cropperDivs[i].getElementsByTagName('img')[0];
            image.onclick = function() {
                var modal_id = this.getAttribute('data-cropper-modal-id');
                $modal = $('#' + modal_id);
                $modal.attr('data-target-image', this.id);
                $('#' + modal_id).modal('show');
            }
            inputs = cropperDivs[i].getElementsByTagName('INPUT');
            for(i in inputs) {
                inpt=inputs[i];
                if (inpt.type == 'file') {
                    inpt.onchange = function() {
                        if (this.files && this.files[0]){
                            var reader = new FileReader();
                            var dci = this.getAttribute('data-cropper-img');

                            reader.onload = function (e) {
                                document.getElementById(dci).src= e.target.result;
                                document.getElementById(dci).setAttribute('data-cropper-original', e.target.result)
                            };
                            reader.readAsDataURL(this.files[0]);
                        }
                    }
                }
            }
        }
    }
});