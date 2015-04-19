<?php

class CWS_Slug_Control_Test_Sanitization extends CWS_Slug_Control_TestCase {
	public function test_rangerific() {
		$tests = array(
			// hyphen-minus
			'0-60 in 3 seconds' => '0 to 60 in 3 seconds',
			'From 0-60 in 3 seconds' => 'From 0 to 60 in 3 seconds',
			'Yankees win, 6-3' => 'Yankees win, 6 to 3',
			'Yankees win, 12-3 in extra innings' => 'Yankees win, 12 to 3 in extra innings',
			// en-dash
			'0–60 in 3 seconds' => '0 to 60 in 3 seconds',
			'From 0–60 in 3 seconds' => 'From 0 to 60 in 3 seconds',
			'Yankees win, 6–3' => 'Yankees win, 6 to 3',
			'Yankees win, 12–3 in extra innings' => 'Yankees win, 12 to 3 in extra innings',
			// em-dash
			'0—60 in 3 seconds' => '0 to 60 in 3 seconds',
			'From 0—60 in 3 seconds' => 'From 0 to 60 in 3 seconds',
			'Yankees win, 6—3' => 'Yankees win, 6 to 3',
			'Yankees win, 12—3 in extra innings' => 'Yankees win, 12 to 3 in extra innings',
			// multiple hyphens-minus
			'0--60 in 3 seconds' => '0 to 60 in 3 seconds',
			'From 0--60 in 3 seconds' => 'From 0 to 60 in 3 seconds',
			'Yankees win, 6--3' => 'Yankees win, 6 to 3',
			'Yankees win, 12--3 in extra innings' => 'Yankees win, 12 to 3 in extra innings',
		);
		foreach ( $tests as $in => $out ) {
			$this->assertEquals( $this->plugin()->rangerific( $in ), $out );
		}
	}

	public function test_percentify() {
		$tests = array(
			'60% of the time, it works every time' => '60 percent of the time, it works every time',
			'Between 5% and 15% of people' => 'Between 5 percent and 15 percent of people',
			'Almost 100%' => 'Almost 100 percent',
		);
		foreach ( $tests as $in => $out ) {
			$this->assertEquals( $this->plugin()->percentify( $in ), $out );
		}
	}
}
