/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
CKEDITOR.editorConfig = function( config ) {
    config.filebrowserBrowseUrl = 'http://localhost/KITT/frontEnd_KIT-master/public/ckeditor/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'http://localhost/KITT/frontEnd_KIT-master/public/ckeditor/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = 'http://localhost/KITT/frontEnd_KIT-master/public/ckeditor/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = 'http://localhost/KITT/frontEnd_KIT-master/public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'http://localhost/KITT/frontEnd_KIT-master/public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'http://localhost/KITT/frontEnd_KIT-master/public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
