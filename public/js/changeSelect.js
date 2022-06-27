/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/changeSelect.js ***!
  \**************************************/
//Если изменмил под категорию меняем категорию
$('select[name="subCategory"]').on("changed.bs.select", function () {
  var dataParentId = $('option:selected', this).attr("data-parent-id");
  var ParentId = $('select[name="category"] option[value="' + dataParentId + '"]').val();
  $('select[name="category"]').selectpicker('val', ParentId);
});
/******/ })()
;