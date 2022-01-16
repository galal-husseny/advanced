<?php



// function DirIsEmpty($folder){
//     return (count(scandir($folder)) == 2 ? true : false);
// }

// function checkIfDir($name){
//     return is_dir($name);
// }

// function checkIfAllFiles($folder){
//     $getData = scandir($folder);
//     foreach ($getData as $key => $value) {
//         if($value == '.' || $value == '..'){
//             continue;
//         }
//         if(checkIfDir($folder.DIRECTORY_SEPARATOR . $value)){
//             if(DirIsEmpty($folder.DIRECTORY_SEPARATOR . $value)){
//                 deleteFolder($folder.DIRECTORY_SEPARATOR . $value);
//             }else{
//                 checkIfAllFiles($folder.DIRECTORY_SEPARATOR . $value);
//             }
//         }else{
//             deleteFile($folder.DIRECTORY_SEPARATOR . $value);
//         }
//     }
// }

// function deleteFilesWithParentFolder($folder) // delete all files in folder and delete parent folder
// {
//     $getData = scandir($folder); // 5
//     foreach ($getData as $key => $value) {
//         if($value == '.' || $value == '..'){
//             continue;
//         }

//         deleteFile($folder. DIRECTORY_SEPARATOR .$value);
//         if(count($getData) == 2){
//             rmdir($folder);
//         }       
//     }
// }

// function deleteFile($file){
//     unlink($file);
// }

// function deleteFolder($folder){
//     rmdir($folder);
// }
// problem empty folder didn't delete
function delete ($folder){ //data/fill
    $getData = scandir($folder); // 5
    foreach ($getData as $key => $value) {
        //skip first 2 indexes
        if($value == '.' || $value == '..'){
            continue;
        }
        // var_dump(is_dir($folder.DIRECTORY_SEPARATOR.$value));

        // delete files only and empty folders only 
        //check if dir 
        if(is_dir($folder.DIRECTORY_SEPARATOR.$value)){ // data/empty
            // check if folder is empty 
            if( count(scandir($folder.DIRECTORY_SEPARATOR.$value)) > 2 ){
                  delete($folder.DIRECTORY_SEPARATOR.$value);  // data/fill/fill1
            }else{
                rmdir($folder.DIRECTORY_SEPARATOR.$value);
            }
        }else{
            //file
            unlink($folder.DIRECTORY_SEPARATOR.$value);
        }
        
        if(count(scandir($folder)) == 2){
            rmdir($folder);
        }
    }
    
}
delete("data");