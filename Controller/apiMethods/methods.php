<?php
  function listBooks() {
    $bookModel = new BookModel();
    $intLimit = 10;
    if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
        $intLimit = $arrQueryStringParams['limit'];
    }
    $arrBooks = $bookModel->getBooks($intLimit);
    return $responseData = json_encode($arrBooks);
  }