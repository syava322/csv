<?php

namespace app\commands;

use app\models\Weather;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\web\UploadedFile;

class ParseController extends Controller
{
//    public function actionIndex(){
//        $this->pathToFile = Yii::getPathOfAlias('uploads') . '/path/to/file.csv';
//        //файл можно загрузить с помощью формы
//
//        if (!file_exists($this->pathToFile) || !is_readable($this->pathToFile)) {
//            //... код, если файл отсутствует
//        }
//        $data = array();
//        if (($handle = fopen($this->pathToFile, 'r')) !== false) {
//            $i = 0;
//            while (($row = fgetcsv($handle, 1000, $this->delimiter)) !== false) {
//                $model = new Weather();
//                $model->data = $row[0];
//                $model->degrees = $row[1];
//                if ($model->validate()) {
//                    $model->save();
//                } else {
//                    return 'fail';
//                }
//            }
//            fclose($handle);
//        }
//    }

//    public function actionImport() {
//
//    }
    public function actionExport() {

    }


//    public function actionCreate()
//    {
//        $model = new Weather();
//
//        if ($model->load(Yii::$app->request->post()) ) {
//
//            $model->file = UploadedFile::getInstance($model, 'file');
//
//            if ( $model->file )
//            {
//                $time = time();
//                $model->file->saveAs('uploads/' .$time. '.' . $model->file->extension);
//                $model->file = 'uploads/' .$time. '.' . $model->file->extension;
//
//                $handle = fopen($model->file, "r");
//                while (($fileop = fgetcsv($handle, 1000, ",")) !== false)
//                {
//                    $data = $fileop[0];
//                    $degrees = $fileop[1];
//                    // print_r($fileop);exit();
//                    $sql = "INSERT INTO weather(data, degrees) VALUES ('$data', '$degrees')";
//                    $query = Yii::$app->db->createCommand($sql)->execute();
//                }
//
//                if ($query)
//                {
//                    echo "data upload successfully";
//                }
//
//            }
//
//            $model->save();
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }

    public function actionImport()
    {
        //путь к файлу
    }
    public function actionExp() {
//        $data = "Data;Grad;\r\n";
//        $model = Weather::model()->findAll();
//        foreach ($model as $value) {
//            $data .= $value->data.
//                ',' . $value->degrees .
//                "\r\n";
//        }
//        header('Content-type: text/csv');
//        header('Content-Disposition: attachment; filename="export_' . date('d.m.Y') . '.csv"');
//        //echo iconv('utf-8', 'windows-1251', $data); //Если вдруг в Windows будут кракозябры
//        Yii::app()->end();
    }

    public function actionCreate()
    {
        $model = new Weather();

        if ($model->load(Yii::$app->request->post()) ) {

            $file = 'uploads/global.csv';

                $handle = fopen($file, "r");
                while (($fileop = fgetcsv($handle, 1000, ",")) !== false)
                {
                    $date = $fileop[0];
                    $degrees = $fileop[1];
                    $location = $fileop[2];
                    // print_r($fileop);exit();
                    $sql = "INSERT INTO details(data, degrees) VALUES ('$date', '$degrees')";
                    $query = Yii::$app->db->createCommand($sql)->execute();
                }

                if ($query)
                {
                    echo "data upload successfully";
                }


            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
}