<?php
$config['category1_settings'] = array(

		array(

                'field' => 'paper_name',

                'label' => 'Paper Name',

                'rules' => 'required|trim|xss_clean|min_length[3]|max_length[30]|is_unique[tbl_papers.paper_name]|callback_name_check'

        )
		
);



$config['paper_settings'] = array(

		array(

                'field' => 'question',

                'label' => 'Question',

                'rules' => 'required|trim|xss_clean|min_length[3]|max_length[150]|is_unique[tbl_questions.question]|callback_name_check'

        )
);



$config['stream_settings'] = array(

		
		array(

                'field' => 'title',

                'label' => 'Stream Name',

                'rules' => 'required|trim|xss_clean|min_length[3]|max_length[30]|is_unique[tbl_streams.title]|callback_name_check'

        )
);



?>