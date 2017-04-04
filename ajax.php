<? include_once ('db/db.php');

if(isset($_POST['answer'])){
    $result =  setPhrasesInDb($_POST);
    echo json_encode($result);
}elseif(isset($_POST['form_name'])){
    if($_POST['form_name']=='folder'){
        $result =  setFolderInDb($_POST['form_input']);
    }elseif($_POST['form_name']=='section'){
        $result =  setSectionInDb($_POST['form_input']);
    }
    echo json_encode($result);
}elseif(isset($_POST['getlist'])){
    $result =  getSectionList($_POST);
    echo json_encode($result);
}elseif(isset($_POST['folder_id'])){
    $result = getSections($_POST['folder_id']);
    echo json_encode($result);
} else{
    header("Location: http://english.vdoma.info/");
    die();
}
/*
при добавлении слов
после каждого добавления обновляется страница
решение: при добавление слова в раздел не обновлять страницу,
а вызвать метод, который еще раз список перегрузит

нужно выводить сообщение не через alert, а через красивое окошко

если не выбран раздел, нет и кнопки добавить фразу
*/