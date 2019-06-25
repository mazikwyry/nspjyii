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
    $("#nanoGallery2").nanogallery2({
      kind:             'google2',
      userID:           '109330119860611396701',
      google2URL:       'https://nanogp2-nspj.herokuapp.com/index.php',
      blackList: 'kopia|copy',
      thumbnailWidth: 'auto',
      thumbnailHeight: 250,
      colorScheme: 'light',
      thumbnailGutterWidth : 0,
      thumbnailGutterHeight : 0,
      thumbnailBorderHorizontal: 0,
      thumbnailBorderVertical: 0,
      i18n: {
        thumbnailImageDescription: 'Powiększ zdjęcie',
        thumbnailAlbumDescription: 'Otwórz album',
        breadcrumbHome: 'Albumy'
      },
      thumbnailAlignment: "center",
      thumbnailLabel: {
          "position": "overImageOnMiddle",
          "titleMultiLine": true
      },
      thumbnailHoverEffect2: "imageScaleIn80|imageSepiaOff|labelAppear75",
    });
  });
</script>


<div class="header_out">
  Galeria Parafialna
</div>
<div id="nanoGallery2"></div>
