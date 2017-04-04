<? include_once ('db/dbconfig.php');
use \db\CreateCommand;


function getAllWorlds(){
    $db = new CreateCommand();
    $result = $db->select('question, answer')->from('english')->fetchArray();
    if($result){
        shuffle($result);
    }else{
        return false;
    }

    return $result;
}

function getAllSection(){
    $db = new CreateCommand();
    $result = $db->select()->from('english_section')->fetchArray();
    return $result;
}

function getAllFolders(){
    $db = new CreateCommand();
    $result = $db->select()->from('english_folder')->fetchArray();
    return $result;
}

function getSectionList($data =array()){
    $query = "SELECT question, answer FROM english WHERE section_id='".$data['section_id']."'";


    $db = new CreateCommand();
    $result = $db->mysqlQuery($query)->fetchArray();

    if($result){
        shuffle($result);
    }else{
        return 0;
    }
    return $result;
}

function setPhrasesInDb($data){

    $db =new CreateCommand();
    $querySql['section_id'] = $data['section_id'];
    $querySql['question'] = $data['question'];
    $querySql['answer'] = $data['answer'];
    $querySql['visible'] = 1;
    $resultQuery = $db->insert('english', $querySql)->mysqlQuery()->getResultQuery();

    return $resultQuery?1:0;
}

function setSectionInDb($section){

    $db = new CreateCommand();
    $querySql['section_name'] = $section;
    $resultQuery = $db->insert('english_section', $querySql)->mysqlQuery()->getResultQuery();

    return $resultQuery?1:0;
}


function setFolderInDb($folder){

    $db = new CreateCommand();
    $querySql['folder_name'] = $folder;
    $resultQuery = $db->insert('english_folder', $querySql)->mysqlQuery()->getResultQuery();

    return $resultQuery?1:0;
}

function getLastAddPhrases(){
    $query = "SELECT section_name, question, answer";
    $query .=" FROM english";
    $query .=" JOIN english_section ON english_section.section_id=english.section_id";
    $query .=" ORDER BY id DESC";
    $query .=" LIMIT 0,20";

    $db = new CreateCommand();

    $resultQuery = $db->mysqlQuery($query)->fetchArray();
    return $resultQuery;
}

function getSections($folder_id){
    $query = 'SELECT  efs.folder_id,es.section_id, es.section_name';
    $query .=' FROM english_section as es';
    $query .=' JOIN `english_folder_section` as efs ON es.section_id= efs.section_id';
    $query .=' WHERE efs.folder_id = "'.$folder_id.'"';

    $db = new CreateCommand();
    $resultQuery = $db->mysqlQuery($query)->fetchArray();

    return $resultQuery?$resultQuery:0;

}





