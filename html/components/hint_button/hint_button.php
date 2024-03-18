<?php
/**
 * Hint button component
 * php version 8.1.2
 * Authors: Rehan Nagoor Mohideen, Ivan Odiel Magtangob, Harir Al-Rubaye,
 *          Harikrishan Singh, Nour Tayem, Thulasi Jothiravi
 */
?>

<div class="hint-button-container">
    <button class="hint-button" onclick="showHint('<?php echo $stage; ?>')">
        <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
    </button>
    <div class="speech-bubble" style="display: none;"></div>
</div>
