<?php

global $wpdb;
$current_user_id = get_current_user_id();
$players_table = $wpdb->prefix . "mk_players";
$player_data = $wpdb->get_row($wpdb->prepare("SELECT money FROM $players_table WHERE user_id = %d", $current_user_id), ARRAY_A);

function meiko_casino($atts) {
    global $wpdb;
    $current_user_id = get_current_user_id();
    $players_table = $wpdb->prefix . "mk_players";
    
    $player_data = $wpdb->get_row($wpdb->prepare("SELECT money FROM $players_table WHERE user_id = %d", $current_user_id), ARRAY_A);
    ob_start();
    ?>
    
    <div class="meiko-casino">
        
        <div class="meiko-casino-crash">
            <h3>Crash Game</h3>
            <form class="crash-form" id="crash-form" method="post">
                <label for="crash_bet">Bet Amount: </label>
                <input type="number" min="1" name="crash_bet" id="crash_bet" />
                <button type="button" id="start-crash">Start Game</button>
                <button type="button" id="cashout" disabled>Cash Out</button>
            </form>
            <h4>Multiplier: <span id="multiplier">1.00x</span></h4>
        </div>
        
        <h3>Roulette Game</h3>
    <div class="roulette-container">
        <div class="roulette-line" id="roulette-wheel">
            <div class="roulette-number red" data-number="1">1</div>
            <div class="roulette-number black" data-number="2">2</div>
            <div class="roulette-number red" data-number="3">3</div>
            <div class="roulette-number black" data-number="4">4</div>
            <div class="roulette-number red" data-number="5">5</div>
            <div class="roulette-number black" data-number="6">6</div>
            <div class="roulette-number red" data-number="7">7</div>
            <div class="roulette-number black" data-number="8">8</div>
            <div class="roulette-number red" data-number="9">9</div>
            <div class="roulette-number black" data-number="10">10</div>
            <div class="roulette-number red" data-number="11">11</div>
            <div class="roulette-number black" data-number="12">12</div>
            <div class="roulette-number red" data-number="13">13</div>
            <div class="roulette-number green" data-number="14">14</div>
            <div class="roulette-number black" data-number="15">15</div>
            <div class="roulette-number red" data-number="16">16</div>
            <div class="roulette-number black" data-number="17">17</div>
            <div class="roulette-number red" data-number="18">18</div>
            <div class="roulette-number black" data-number="19">19</div>
            <div class="roulette-number red" data-number="20">20</div>
            <div class="roulette-number black" data-number="21">21</div>
            <div class="roulette-number red" data-number="22">22</div>
            <div class="roulette-number black" data-number="23">23</div>
            <div class="roulette-number red" data-number="24">24</div>
            <div class="roulette-number black" data-number="25">25</div>
            <div class="roulette-number red" data-number="26">26</div>
            <div class="roulette-number black" data-number="27">27</div>
            <div class="roulette-number red" data-number="28">28</div>
            <div class="roulette-number black" data-number="29">29</div>
            <div class="roulette-number red" data-number="30">30</div>
            <div class="roulette-number black" data-number="31">31</div>
            <div class="roulette-number red" data-number="32">32</div>
            <div class="roulette-number black" data-number="33">33</div>
            <div class="roulette-number red" data-number="34">34</div>
            <div class="roulette-number black" data-number="35">35</div>
            <div class="roulette-number red" data-number="36">36</div>
            <div class="roulette-number black" data-number="37">37</div>
            <div class="roulette-number red" data-number="38">38</div>
            <div class="roulette-number black" data-number="39">39</div>
            <div class="roulette-number red" data-number="40">40</div>
            <div class="roulette-number black" data-number="41">41</div>
            <div class="roulette-number red" data-number="42">42</div>
            <div class="roulette-number black" data-number="43">43</div>
            <div class="roulette-number red" data-number="44">44</div>
            <div class="roulette-number black" data-number="45">45</div>
            <div class="roulette-number red" data-number="46">46</div>
            <div class="roulette-number black" data-number="47">47</div>
            <div class="roulette-number red" data-number="48">48</div>
            <div class="roulette-number black" data-number="49">49</div>
            
            <!-- Duplicate set of numbers -->
            <div class="roulette-number red" data-number="1">1</div>
            <div class="roulette-number black" data-number="2">2</div>
            <div class="roulette-number red" data-number="3">3</div>
            <div class="roulette-number black" data-number="4">4</div>
            <div class="roulette-number red" data-number="5">5</div>
            <div class="roulette-number black" data-number="6">6</div>
            <div class="roulette-number red" data-number="7">7</div>
            <div class="roulette-number black" data-number="8">8</div>
            <div class="roulette-number red" data-number="9">9</div>
            <div class="roulette-number black" data-number="10">10</div>
            <div class="roulette-number red" data-number="11">11</div>
            <div class="roulette-number black" data-number="12">12</div>
            <div class="roulette-number red" data-number="13">13</div>
            <div class="roulette-number green" data-number="14">14</div>
            <div class="roulette-number black" data-number="15">15</div>
            <div class="roulette-number red" data-number="16">16</div>
            <div class="roulette-number black" data-number="17">17</div>
            <div class="roulette-number red" data-number="18">18</div>
            <div class="roulette-number black" data-number="19">19</div>
            <div class="roulette-number red" data-number="20">20</div>
            <div class="roulette-number black" data-number="21">21</div>
            <div class="roulette-number red" data-number="22">22</div>
            <div class="roulette-number black" data-number="23">23</div>
            <div class="roulette-number red" data-number="24">24</div>
            <div class="roulette-number black" data-number="25">25</div>
            <div class="roulette-number red" data-number="26">26</div>
            <div class="roulette-number black" data-number="27">27</div>
            <div class="roulette-number red" data-number="28">28</div>
            <div class="roulette-number black" data-number="29">29</div>
            <div class="roulette-number red" data-number="30">30</div>
            <div class="roulette-number black" data-number="31">31</div>
            <div class="roulette-number red" data-number="32">32</div>
            <div class="roulette-number black" data-number="33">33</div>
            <div class="roulette-number red" data-number="34">34</div>
            <div class="roulette-number black" data-number="35">35</div>
            <div class="roulette-number red" data-number="36">36</div>
            <div class="roulette-number black" data-number="37">37</div>
            <div class="roulette-number red" data-number="38">38</div>
            <div class="roulette-number black" data-number="39">39</div>
            <div class="roulette-number red" data-number="40">40</div>
            <div class="roulette-number black" data-number="41">41</div>
            <div class="roulette-number red" data-number="42">42</div>
            <div class="roulette-number black" data-number="43">43</div>
            <div class="roulette-number red" data-number="44">44</div>
            <div class="roulette-number black" data-number="45">45</div>
            <div class="roulette-number red" data-number="46">46</div>
            <div class="roulette-number black" data-number="47">47</div>
            <div class="roulette-number red" data-number="48">48</div>
            <div class="roulette-number black" data-number="49">49</div>

            <!-- Duplicate set of numbers -->
            <div class="roulette-number red" data-number="1">1</div>
            <div class="roulette-number black" data-number="2">2</div>
            <div class="roulette-number red" data-number="3">3</div>
            <div class="roulette-number black" data-number="4">4</div>
            <div class="roulette-number red" data-number="5">5</div>
            <div class="roulette-number black" data-number="6">6</div>
            <div class="roulette-number red" data-number="7">7</div>
            <div class="roulette-number black" data-number="8">8</div>
            <div class="roulette-number red" data-number="9">9</div>
            <div class="roulette-number black" data-number="10">10</div>
            <div class="roulette-number red" data-number="11">11</div>
            <div class="roulette-number black" data-number="12">12</div>
            <div class="roulette-number red" data-number="13">13</div>
            <div class="roulette-number green" data-number="14">14</div>
            <div class="roulette-number black" data-number="15">15</div>
            <div class="roulette-number red" data-number="16">16</div>
            <div class="roulette-number black" data-number="17">17</div>
            <div class="roulette-number red" data-number="18">18</div>
            <div class="roulette-number black" data-number="19">19</div>
            <div class="roulette-number red" data-number="20">20</div>
            <div class="roulette-number black" data-number="21">21</div>
            <div class="roulette-number red" data-number="22">22</div>
            <div class="roulette-number black" data-number="23">23</div>
            <div class="roulette-number red" data-number="24">24</div>
            <div class="roulette-number black" data-number="25">25</div>
            <div class="roulette-number red" data-number="26">26</div>
            <div class="roulette-number black" data-number="27">27</div>
            <div class="roulette-number red" data-number="28">28</div>
            <div class="roulette-number black" data-number="29">29</div>
            <div class="roulette-number red" data-number="30">30</div>
            <div class="roulette-number black" data-number="31">31</div>
            <div class="roulette-number red" data-number="32">32</div>
            <div class="roulette-number black" data-number="33">33</div>
            <div class="roulette-number red" data-number="34">34</div>
            <div class="roulette-number black" data-number="35">35</div>
            <div class="roulette-number red" data-number="36">36</div>
            <div class="roulette-number black" data-number="37">37</div>
            <div class="roulette-number red" data-number="38">38</div>
            <div class="roulette-number black" data-number="39">39</div>
            <div class="roulette-number red" data-number="40">40</div>
            <div class="roulette-number black" data-number="41">41</div>
            <div class="roulette-number red" data-number="42">42</div>
            <div class="roulette-number black" data-number="43">43</div>
            <div class="roulette-number red" data-number="44">44</div>
            <div class="roulette-number black" data-number="45">45</div>
            <div class="roulette-number red" data-number="46">46</div>
            <div class="roulette-number black" data-number="47">47</div>
            <div class="roulette-number red" data-number="48">48</div>
            <div class="roulette-number black" data-number="49">49</div>
            <div class="roulette-indicator" id="roulette-indicator"></div>
        </div>
        </div>
        <form class="roulette-form" method="post" action="">
            <label for="roulette_bet">Bet Amount: </label>
            <input type="number" min="1" name="roulette_bet" id="roulette_bet" />
            <label for="color">Choose a color: </label>
            <select name="color" id="color">
                <option value="red">Red</option>
                <option value="black">Black</option>
                <option value="green">Green</option>
            </select>
            <button type="button" id="play_roulette_animation">Play Roulette</button>
        </form>

        <h4>Your Current Balance: $<?php echo esc_html(isset($player_data['money']) ? $player_data['money'] : '0'); ?></h4>
    </div>

    </div>
    <?php
    return ob_get_clean();
}

function place_crash_bet() {
    // Verify the nonce and if user is logged in
    check_ajax_referer('meiko_casino_nonce', 'casino_security');
    if (!is_user_logged_in()) {
        echo json_encode(array('error' => 'User is not logged in.'));
        wp_die();
    }

    global $wpdb;
    $current_user_id = get_current_user_id();
    $players_table = $wpdb->prefix . "mk_players";
    
    if (!isset($_POST['bet_amount']) || !is_numeric($_POST['bet_amount'])) {
        echo json_encode(array('error' => 'Invalid bet amount.'));
        wp_die();
    }
    
    $bet_amount = floatval($_POST['bet_amount']);
    $player_data = $wpdb->get_row($wpdb->prepare("SELECT money FROM $players_table WHERE user_id = %d", $current_user_id), ARRAY_A);
    $current_balance = floatval($player_data['money']);
    
    if ($bet_amount <= 0 || $bet_amount > $current_balance) {
        echo json_encode(array('error' => 'Invalid bet amount.'));
        wp_die();
    }
    
    $new_balance = max(0, $current_balance - $bet_amount);
    update_user_meta($current_user_id, 'current_bet', $bet_amount);

    $wpdb->update(
        $players_table,
        array('money' => $new_balance),
        array('user_id' => $current_user_id),
        array('%f'),
        array('%d')
    );
    
    echo json_encode(array('new_balance' => $new_balance));
    
    wp_die();
    error_log('Meiko Casino: Placed crash bet');
}

function cash_out_crash() {
    check_ajax_referer('meiko_casino_nonce', 'casino_security');
    if (!is_user_logged_in()) {
        echo json_encode(array('error' => 'User is not logged in.'));
        wp_die();
    }

    global $wpdb;
    $current_user_id = get_current_user_id();
    $players_table = $wpdb->prefix . "mk_players";
    
    if (!isset($_POST['multiplier']) || !is_numeric($_POST['multiplier'])) {
        echo json_encode(array('error' => 'Invalid multiplier.'));
        wp_die();
    }
    
    $multiplier = floatval($_POST['multiplier']);
    $player_data = $wpdb->get_row($wpdb->prepare("SELECT money FROM $players_table WHERE user_id = %d", $current_user_id), ARRAY_A);
    $current_balance = floatval($player_data['money']);
    $bet_amount = floatval(get_user_meta($current_user_id, 'current_bet', true));
    
    $winnings = $bet_amount * $multiplier;
    $new_balance = max(0, $current_balance + $winnings);
    
    $wpdb->update(
        $players_table,
        array('money' => $new_balance),
        array('user_id' => $current_user_id),
        array('%f'),
        array('%d')
    );
    
    delete_user_meta($current_user_id, 'current_bet');
    
    echo json_encode(array('new_balance' => $new_balance));
    
    wp_die();
    error_log('Meiko Casino: Cashed out in crash game');
}

function play_roulette_animation() {
    
    if (!is_user_logged_in()) {
        echo json_encode(array('error' => 'User is not logged in.'));
        wp_die();
    }

    global $wpdb;
    $current_user_id = get_current_user_id();
    $players_table = $wpdb->prefix . "mk_players";
    $result_numbers = range(1, 20); // Range of possible result numbers

    if (!isset($_POST['bet_amount']) || !is_numeric($_POST['bet_amount']) || 
        !isset($_POST['chosen_color']) || !in_array($_POST['chosen_color'], array('red', 'black', 'green'))) {
        echo json_encode(array('error' => 'Invalid input.'));
        wp_die();
    }

    $bet_amount = floatval($_POST['bet_amount']);
    $chosen_color = sanitize_text_field($_POST['chosen_color']);
    
    $player_data = $wpdb->get_row($wpdb->prepare("SELECT money FROM $players_table WHERE user_id = %d", $current_user_id), ARRAY_A);
    $current_balance = floatval($player_data['money']);
    
    if ($bet_amount <= 0 || $bet_amount > $current_balance) {
        echo json_encode(array('error' => 'Invalid bet amount.'));
        wp_die();
    }

    $result_number = $result_numbers[array_rand($result_numbers)];
    
    $new_balance = $current_balance - $bet_amount;
    if ($chosen_color == 'green' && $result_number % 2 == 0) {
        $winnings = $bet_amount * 14;
        $new_balance += $winnings;
    } elseif (($chosen_color == 'red' && $result_number % 2 == 1) || ($chosen_color == 'black' && $result_number % 2 == 0)) {
        $winnings = $bet_amount * 2;
        $new_balance += $winnings;
    }
    
    $new_balance = max(0, $new_balance);
    
    $wpdb->update(
        $players_table,
        array('money' => $new_balance),
        array('user_id' => $current_user_id),
        array('%f'),
        array('%d')
    );
    error_log('Chosen Color: ' . $chosen_color);
    error_log('Result Number: ' . $result_number);
    
    echo json_encode($response);
    
    wp_die();
    error_log('Meiko Casino: Played roulette animation');
}
