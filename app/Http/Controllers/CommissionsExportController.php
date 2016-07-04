<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commission;
use App\Event;
use App\Test_user;

class CommissionsExportController extends Controller
{
    public function export_test_event($commission, $event)
    {
    	$commission = Commission::findOrFail($commission);
        $event = Event::findOrFail($event);

    	$phpWord = new \PhpOffice\PhpWord\PhpWord();


	    $section = $phpWord->addSection();
	    $phpWord->addFontStyle('rStyle', array('bold' => false, 'italic' => false, 'size' => 14, 'name' =>'Times New Roman'));
		$phpWord->addParagraphStyle('pStyle', array('align' => 'both', 'spaceAfter' => 0));
		$phpWord->addTitleStyle(1, array('bold' => true,'size' => 14, 'name' =>'Times New Roman'), array('spaceAfter' => 0,'align'=>'center'));
	   	
	   /*	$headerFontStyle = new \PhpOffice\PhpWord\Style\Font();
	    $headerFontStyle->setBold(true);
	    $headerFontStyle->setName('Times New Roman');
	    $headerFontStyle->setSize(14);
		*/
	    $fontStyle = new \PhpOffice\PhpWord\Style\Font();
	    $fontStyle->setBold(false);
	    $fontStyle->setName('Times New Roman');
	    $fontStyle->setSize(14); 

	    $styleTable = array('borderSize' => 6, 'borderColor' => '000000', 'cellMarginLeft' => 80,'cellMarginRight' => 80, 'alignment' => 'center', 'spacing' => 0);
		$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '000000', 'bgColor' => 'FFFFFF');
	    $styleCell = array('valign' => 'center','margin' => 10);

	    $section->addTitle('Отчет о прохождения тестирования', 1);
	    $section->addTitle('"'.$event->event_description()->title.'"', 1);

	    $section->addTextBreak(1);

	    $phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
		$table = $section->addTable('Fancy Table');
		$table->addRow(900);
		$table->addCell(3500, $styleCell)->addText(htmlspecialchars('Ф.И.О.', ENT_COMPAT, 'UTF-8'), $fontStyle,array('align' => 'center'));
		$table->addCell(2500, $styleCell)->addText(htmlspecialchars('Наилучший результат, %', ENT_COMPAT, 'UTF-8'), $fontStyle,array('align' => 'center'));
		$table->addCell(2500, $styleCell)->addText(htmlspecialchars('Количество попыток', ENT_COMPAT, 'UTF-8'), $fontStyle,array('align' => 'center'));
		foreach ($commission->common_users() as $user) 
		{
			$table->addRow();
			$attempts = $user->test_user_pivot()->where('test_id', '=', $event->type_id);
			$table->addCell(3500)->addText(htmlspecialchars($user->full_name(), ENT_COMPAT, 'UTF-8'), $fontStyle);
		    $table->addCell(2500)->addText(htmlspecialchars($event->stat_to_mark($user->id), ENT_COMPAT, 'UTF-8'), $fontStyle);
		    $table->addCell(2500)->addText(htmlspecialchars($attempts->count(), ENT_COMPAT, 'UTF-8'), $fontStyle);
		}

		foreach ($commission->common_users() as $user) 
		{
			foreach ($user->test_attempts($event->type_id)->get() as $attempt)
			{
				$section = $phpWord->addSection();

				if (file_exists('tests/'.$attempt->id.'.xml')) 
				{
           			$xml = simplexml_load_file('tests/'.$attempt->id.'.xml');
       
					$section->addTitle('ПРОТОКОЛ ТЕСТИРОВАНИЯ', 1);
					$section->addTextBreak(1);
					$section->addText('Ф.И.О.: '.$user->full_name(), 'rStyle','pStyle');
					$section->addText('Тест: '.$event->event_description()->title, 'rStyle','pStyle');
					$section->addText('Дата и время: '.$xml->datetime, 'rStyle','pStyle');
					$section->addText('Результат: '.$xml->earned.'/'.$xml->total.' ('.round($xml->earned/$xml->total * 100).')%', 'rStyle','pStyle');
					$section->addTextBreak(1);
					
					$table = $section->addTable('Fancy Table');
					$table->addRow(500);
					$table->addCell(1000, $styleCell)->addText(htmlspecialchars('№ п/п.', ENT_COMPAT, 'UTF-8'), $fontStyle,array('align' => 'center'));
					$table->addCell(5500, $styleCell)->addText(htmlspecialchars('Вопрос', ENT_COMPAT, 'UTF-8'), $fontStyle,array('align' => 'center'));
					$table->addCell(2000, $styleCell)->addText(htmlspecialchars('Результат', ENT_COMPAT, 'UTF-8'), $fontStyle,array('align' => 'center'));
					$n = 1; //счетчик вопросов
					foreach ($xml->questions->question as $q_name => $q_row)
					{
		                $table->addRow(500);
		                $table->addCell(1000, $styleCell)->addText(htmlspecialchars($n.'.', ENT_COMPAT, 'UTF-8'), $fontStyle,array('align' => 'both'));
		                $table->addCell(5500, $styleCell)->addText(htmlspecialchars($q_row, ENT_COMPAT, 'UTF-8'), $fontStyle,array('align' => 'both'));
		                if ($q_row['correct']==1) {$q_status='Верно';}else{$q_status='Неверно';}
		                $table->addCell(5500, $styleCell)->addText(htmlspecialchars($q_status, ENT_COMPAT, 'UTF-8'), $fontStyle,array('align' => 'both'));
		                $n++;
					}

				} else {
					$section->addText('Не удалось открыть файл с данными о попытке.', 'rStyle');
       			}
			}

	    }



	    // Finally, write the document:
	        // The files will be in your public folder
	    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
	    $objWriter->save('helloWorld.docx');

	    return back();
    }
}
