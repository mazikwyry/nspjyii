<style>
  video {
    visibility: visible;
    opacity: 1;
    position: absolute;
    top: 0px;
    bottom: 0px;
    left: 0px;
    right: 0px;
    margin: auto;
    zoom: 1;
    -webkit-user-select: none;
    object-fit: contain;
    z-index: 99999999999;
  }
  .nanogallery_colorscheme_default .nanoGalleryContainer > .nanoGalleryThumbnailContainer{
    border:transparent !important;
  }
  .nanogallery_colorscheme_default .nanoGalleryNavigationbar .oneFolder{
    color: #333 !important;
  }
  .nanogallery_colorscheme_default .nanoGalleryNavigationbar .oneFolder:hover{
    color: #b80000 !important;
  }
</style>

<script>
  $(document).ready(function () {
    $("#nanoGallery2").nanoGallery({
      kind: 'picasa',
      userID: '109330119860611396701',
      blackList: 'kopia|copy',
      thumbnailWidth: 'auto',
      thumbnailHeight: 250,
      colorScheme: 'clean',
      thumbnailHoverEffect: [{ name: 'labelAppear75', duration: 300 }],
      theme: 'light',
      thumbnailGutterWidth : 0,
      thumbnailGutterHeight : 0,
      i18n: {
        thumbnailImageDescription: 'Powiększ zdjęcie',
        thumbnailAlbumDescription: 'Otwórz album',
        breadcrumbHome: 'Albumy'
      },
      thumbnailLabel: { display: true, position: 'overImageOnMiddle', align: 'center' }
    });
  });
</script>


<div class="header_out">
  Galeria Parafialna
</div>
<div id="nanoGallery2"></div>

<script>
$(document).on('click', '#videoPlayer', function(e){
  e.stopPropagation();
});
</script>
