<?php
session_start();

$con = pg_connect("host=localhost dbname=farm_crops user=postgres password=123") or die("Could not connect to server\n");

// crud for agronomic information table start 

if (isset($_POST['save_agronomic_information'])) {
    // Inserting into agronomic_information table
    $query = "INSERT INTO agronomic_information 
        (crop_id, days_to_mature, yield_potential, pest_and_disease_resistance) 
        VALUES 
        ('{$_POST['crop_id']}', '{$_POST['days_to_mature']}', '{$_POST['yield_potential']}',
        '{$_POST['pest_and_disease_resistance']}') 
        RETURNING agronomic_information_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $agronomic_information_id = $row[0];

        $_SESSION['message'] = "Agronomic Information Created Successfully";
        header("Location: agronomic_information.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Agronomic Information Not Created";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: agronomic_information-create.php");
        exit(0);
    }
}

if (isset($_POST['update_agronomic_information'])) {
    $agronomic_information_id = pg_escape_string($con, $_POST['agronomic_information_id']);
    $crop_id = pg_escape_string($con, $_POST['crop_id']);
    $days_to_mature = pg_escape_string($con, $_POST['days_to_mature']);
    $yield_potential = pg_escape_string($con, $_POST['yield_potential']);
    $pest_and_disease_resistance = pg_escape_string($con, $_POST['pest_and_disease_resistance']);

    $query = "UPDATE agronomic_information SET 
            crop_id = '$crop_id',
            days_to_mature = '$days_to_mature',
            yield_potential = '$yield_potential',
            pest_and_disease_resistance = '$pest_and_disease_resistance'
            WHERE agronomic_information_id = $agronomic_information_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Agronomic Information Updated Successfully";
        header("Location: agronomic_information.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Agronomic Information Not Updated";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: agronomic_information.php");
        exit(0);
    }
}

if (isset($_POST['delete_agronomic_information'])) {
    $agronomic_information_id = pg_escape_string($con, $_POST['delete_agronomic_information']);
    $query = "DELETE FROM agronomic_information WHERE agronomic_information_id='$agronomic_information_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Agronomic Information Deleted Successfully";
        header("Location: agronomic_information.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Agronomic Information Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: agronomic_information.php");
        exit(0);
    }
}
// crud for agronomic information table end 


// crud for arts and languages table start 

if (isset($_POST['save_arts_and_languages'])) {
    // Inserting into arts and languages table
    $query = "INSERT INTO arts_and_languages 
        (tribe_id, arts_and_cultural_expression, role_of_indigenous_languages) 
        VALUES 
        ('{$_POST['tribe_id']}', '{$_POST['arts_and_cultural_expression']}', '{$_POST['role_of_indigenous_languages']}') 
        RETURNING arts_and_languages_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $arts_and_languages_id = $row[0];

        $_SESSION['message'] = "Arts and Languages Created Successfully";
        header("Location: arts_and_languages.php");
        exit(0);
        // } else {
        //     Print PostgreSQL error message
        //     echo "Error: " . pg_last_error($con);
        //     exit; // Stop further execution
        // }
    } else {
        $_SESSION['message'] = "Arts and Languages Not Created";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: arts_and_languages-create.php");
        exit(0);
    }
}

if (isset($_POST['update_arts_and_languages'])) {
    $arts_and_languages_id = pg_escape_string($con, $_POST['arts_and_languages_id']);
    $tribe_id = pg_escape_string($con, $_POST['tribe_id']);
    $arts_and_cultural_expression = pg_escape_string($con, $_POST['arts_and_cultural_expression']);
    $role_of_indigenous_languages = pg_escape_string($con, $_POST['role_of_indigenous_languages']);

    $query = "UPDATE arts_and_languages SET 
            tribe_id = '$tribe_id',
            arts_and_cultural_expression = '$arts_and_cultural_expression',
            role_of_indigenous_languages = '$role_of_indigenous_languages'
            WHERE arts_and_languages_id = $arts_and_languages_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Arts and Languages Updated Successfully";
        header("Location: arts_and_languages.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Arts and Languages Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: arts_and_languages.php");
        exit(0);
    }
}

if (isset($_POST['delete_arts_and_languages'])) {
    $arts_and_languages_id = pg_escape_string($con, $_POST['delete_arts_and_languages']);
    $query = "DELETE FROM arts_and_languages WHERE arts_and_languages_id='$arts_and_languages_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Arts and Languages Deleted Successfully";
        header("Location: arts_and_languages.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Arts and Languages Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: arts_and_languages.php");
        exit(0);
    }
}

// crud for arts and languages table end 


// crud for cultural heritage table start 

if (isset($_POST['save_cultural_heritage'])) {
    // Inserting into arts and languages table
    $query = "INSERT INTO cultural_heritage 
        (tribe_id, preservation_of_cultural_heritage, economic_development, history_culture) 
        VALUES 
        ('{$_POST['tribe_id']}', '{$_POST['preservation_of_cultural_heritage']}', '{$_POST['economic_development']}',
        '{$_POST['history_culture']}') 
        RETURNING cultural_heritage_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $cultural_heritage_id = $row[0];

        $_SESSION['message'] = "Cultral Heritage Created Successfully";
        header("Location: cultural_heritage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Cultral Heritage Not Created";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: cultural_heritage-create.php");
        exit(0);
    }
}

if (isset($_POST['update_cultural_heritage'])) {
    $cultural_heritage_id = pg_escape_string($con, $_POST['cultural_heritage_id']);
    $tribe_id = pg_escape_string($con, $_POST['tribe_id']);
    $preservation_of_cultural_heritage = pg_escape_string($con, $_POST['preservation_of_cultural_heritage']);
    $economic_development = pg_escape_string($con, $_POST['economic_development']);
    $history_culture = pg_escape_string($con, $_POST['history_culture']);

    $query = "UPDATE cultural_heritage SET 
            tribe_id = '$tribe_id',
            preservation_of_cultural_heritage = '$preservation_of_cultural_heritage',
            economic_development = '$economic_development',
            history_culture = '$history_culture'
            WHERE cultural_heritage_id = $cultural_heritage_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Cultural Heritage Updated Successfully";
        header("Location: cultural_heritage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Cultural Heritage Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: cultural_heritage.php");
        exit(0);
    }
}

if (isset($_POST['delete_cultural_heritage'])) {
    $cultural_heritage_id = pg_escape_string($con, $_POST['delete_cultural_heritage']);
    $query = "DELETE FROM cultural_heritage WHERE cultural_heritage_id='$cultural_heritage_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Cultural Heritage Deleted Successfully";
        header("Location: cultural_heritage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Cultural Heritage Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: cultural_heritage.php");
        exit(0);
    }
}

// crud for cultural heritage table end 

// crud for crop cultural significance table start

if (isset($_POST['save_crop_cultural_significance'])) {
    // Inserting into arts and languages table
    $query = "INSERT INTO crop_cultural_significance 
        (crop_id, historical_context_and_traditional_knowledge, role_in_local_cuisine_and_customs,
        cultural_values_and_beliefs_associated_with_traditional_crop, cultural_and_spiritual_significance) 
        VALUES 
        ('{$_POST['crop_id']}', '{$_POST['historical_context_and_traditional_knowledge']}', '{$_POST['role_in_local_cuisine_and_customs']}',
        '{$_POST['cultural_values_and_beliefs_associated_with_traditional_crop']}', '{$_POST['cultural_and_spiritual_significance']}') 
        RETURNING cultural_significance_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $cultural_significance_id = $row[0];

        $_SESSION['message'] = "Crop Cultural Significance  Created Successfully";
        header("Location: crop_cultural_significance.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Crop Cultural Significance Not Created";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: crop_cultural_significance-create.php");
        exit(0);
    }
}

if (isset($_POST['update_crop_cultural_significance'])) {
    $cultural_significance_id = pg_escape_string($con, $_POST['cultural_significance_id']);
    $crop_id = pg_escape_string($con, $_POST['crop_id']);
    $historical_context_and_traditional_knowledge = pg_escape_string($con, $_POST['historical_context_and_traditional_knowledge']);
    $role_in_local_cuisine_and_customs = pg_escape_string($con, $_POST['role_in_local_cuisine_and_customs']);
    $cultural_values_and_beliefs_associated_with_traditional_crop = pg_escape_string($con, $_POST['cultural_values_and_beliefs_associated_with_traditional_crop']);
    $cultural_and_spiritual_significance = pg_escape_string($con, $_POST['cultural_and_spiritual_significance']);

    $query = "UPDATE crop_cultural_significance SET 
            crop_id = '$crop_id',
            historical_context_and_traditional_knowledge = '$historical_context_and_traditional_knowledge',
            role_in_local_cuisine_and_customs = '$role_in_local_cuisine_and_customs',
            cultural_values_and_beliefs_associated_with_traditional_crop = '$cultural_values_and_beliefs_associated_with_traditional_crop',
            cultural_and_spiritual_significance = '$cultural_and_spiritual_significance'
            WHERE cultural_significance_id = $cultural_significance_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Crop Cultural Significance Updated Successfully";
        header("Location: crop_cultural_significance.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Crop Cultural Significance Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: crop_cultural_significance.php");
        exit(0);
    }
}

if (isset($_POST['delete_crop_cultural_significance'])) {
    $cultural_significance_id = pg_escape_string($con, $_POST['delete_crop_cultural_significance']);
    $query = "DELETE FROM crop_cultural_significance WHERE cultural_significance_id='$cultural_significance_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Crop Cultural Significance Deleted Successfully";
        header("Location: crop_cultural_significance.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Crop Cultural Significance Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: crop_cultural_significance.php");
        exit(0);
    }
}

// crud for crop cultural significance  table end

// crud for Crop table start

if (isset($_POST['save_crops'])) {
    // Inserting into arts and languages table
    $query = "INSERT INTO crops
        (\"image\", crop_name, scientific_name, variety_name, meaning_of_name, \"description\", when_how_used, upland_or_lowland, season,
        conservation_status, economic_importance, category, links, preservation_status) 
        VALUES 
        ('{$_POST['image']}', '{$_POST['scientific_name']}', '{$_POST['crop_name']}', '{$_POST['variety_name']}', '{$_POST['meaning_of_name']}'
        , '{$_POST['description']}', '{$_POST['when_how_used']}', '{$_POST['upland_or_lowland']}', '{$_POST['season']}'
        , '{$_POST['conservation_status']}', '{$_POST['economic_importance']}', '{$_POST['category']}', '{$_POST['links']}', '{$_POST['preservation_status']}') 
        RETURNING crop_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $crop_id = $row[0];

        $_SESSION['message'] = "Crop Created Successfully";
        header("Location: crops.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Crop Not Created";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: crops-create.php");
        exit(0);
    }
}

if (isset($_POST['update_crops'])) {
    $crop_id = pg_escape_string($con, $_POST['crop_id']);
    $crop_name = pg_escape_string($con, $_POST['crop_name']);
    $image = pg_escape_string($con, $_POST['image']);
    $scientific_name = pg_escape_string($con, $_POST['scientific_name']);
    $variety_name = pg_escape_string($con, $_POST['variety_name']);
    $meaning_of_name = pg_escape_string($con, $_POST['meaning_of_name']);
    $description = pg_escape_string($con, $_POST['description']);
    $when_how_used = pg_escape_string($con, $_POST['when_how_used']);
    $upland_or_lowland = pg_escape_string($con, $_POST['upland_or_lowland']);
    $season = pg_escape_string($con, $_POST['season']);
    $conservation_status = pg_escape_string($con, $_POST['conservation_status']);
    $economic_importance = pg_escape_string($con, $_POST['economic_importance']);
    $category = pg_escape_string($con, $_POST['category']);
    $links = pg_escape_string($con, $_POST['links']);
    $preservation_status = pg_escape_string($con, $_POST['preservation_status']);


    $query = "UPDATE crops SET 
            \"image\" = '$image',
            crop_name = '$crop_name',
            scientific_name = '$scientific_name',
            variety_name = '$variety_name',
            meaning_of_name = '$meaning_of_name',
            \"description\" = '$description',
            when_how_used = '$when_how_used',
            upland_or_lowland = '$upland_or_lowland',
            season = '$season',
            conservation_status = '$conservation_status',
            economic_importance = '$economic_importance',
            category = '$category',
            links = '$links',
            preservation_status = '$preservation_status'
            WHERE crop_id = $crop_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Crop Updated Successfully";
        header("Location: crops.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Crop Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: crops.php");
        exit(0);
    }
}

if (isset($_POST['delete_crops'])) {
    $crop_id = pg_escape_string($con, $_POST['delete_crops']);
    $query = "DELETE FROM crops WHERE crop_id='$crop_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Crop Deleted Successfully";
        header("Location: crops.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Crop Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: crops.php");
        exit(0);
    }
}

// crud for Crop table end

// crud for Tribe table start

if (isset($_POST['save_tribe'])) {
    // Inserting into arts and languages table
    $query = "INSERT INTO tribe
        (\"name\", \"description\", traditional_way_of_life, religous_belief, languages, image) 
        VALUES 
        ('{$_POST['name']}', '{$_POST['description']}', '{$_POST['traditional_way_of_life']}', '{$_POST['religous_belief']}'
        , '{$_POST['languages']}', '{$_POST['image']}') 
        RETURNING tribe_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $tribe_id = $row[0];

        $_SESSION['message'] = "Tribe Created Successfully";
        header("Location: tribe.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Tribe Not Created";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: tribe-create.php");
        exit(0);
    }
}

if (isset($_POST['update_tribe'])) {
    $tribe_id = pg_escape_string($con, $_POST['tribe_id']);
    $name = pg_escape_string($con, $_POST['name']);
    $description = pg_escape_string($con, $_POST['description']);
    $traditional_way_of_life = pg_escape_string($con, $_POST['traditional_way_of_life']);
    $religous_belief = pg_escape_string($con, $_POST['religous_belief']);
    $languages = pg_escape_string($con, $_POST['languages']);
    $image = pg_escape_string($con, $_POST['image']);

    $query = "UPDATE tribe SET 
            \"name\" = '$name',
            \"description\" = '$description',
            traditional_way_of_life = '$traditional_way_of_life',
            religous_belief = '$religous_belief',
            languages = '$languages',
            image = '$image'
            WHERE tribe_id = $tribe_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Crop Updated Successfully";
        header("Location: tribe.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Crop Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: tribe.php");
        exit(0);
    }
}

if (isset($_POST['delete_tribe'])) {
    $tribe_id = pg_escape_string($con, $_POST['delete_tribe']);
    $query = "DELETE FROM tribe WHERE tribe_id='$tribe_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Tribe Deleted Successfully";
        header("Location: tribe.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Tribe Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: tribe.php");
        exit(0);
    }
}

// crud for Tribe table end

// crud for Governance table start

if (isset($_POST['save_governance'])) {
    // Inserting into arts and languages table
    $query = "INSERT INTO governance 
        (tribe_id, tribal_governance, intertribal_relations) 
        VALUES 
        ('{$_POST['tribe_id']}', '{$_POST['tribal_governance']}', '{$_POST['intertribal_relations']}') 
        RETURNING governance_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $governance_id = $row[0];

        $_SESSION['message'] = "Governance Created Successfully";
        header("Location: governance.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Governance Not Created";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: governance-create.php");
        exit(0);
    }
}

if (isset($_POST['update_governance'])) {
    $governance_id = pg_escape_string($con, $_POST['governance_id']);
    $tribe_id = pg_escape_string($con, $_POST['tribe_id']);
    $tribal_governance = pg_escape_string($con, $_POST['tribal_governance']);
    $intertribal_relations = pg_escape_string($con, $_POST['intertribal_relations']);

    $query = "UPDATE governance SET 
            tribe_id = '$tribe_id',
            tribal_governance = '$tribal_governance',
            intertribal_relations = '$intertribal_relations'
            WHERE governance_id = $governance_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Governance Updated Successfully";
        header("Location: governance.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Governance Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: governance.php");
        exit(0);
    }
}

if (isset($_POST['delete_governance'])) {
    $governance_id = pg_escape_string($con, $_POST['delete_governance']);
    $query = "DELETE FROM governance WHERE governance_id='$governance_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Governance Deleted Successfully";
        header("Location: governance.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Governance Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: governance.php");
        exit(0);
    }
}

// crud for Governance table end

// crud for Practice table start

if (isset($_POST['save_practice'])) {
    // Inserting into arts and languages table
    $query = "INSERT INTO practice 
        (tribe_id, practice_name, \"description\", \"image\", planting_practice, post_harvest_practice,
        pest_control, tools_or_equipment, cultural_significance, definition_and_characteristics, length_of_practice_period,
        intervention_and_alternatives, challenges_and_sustainability_of_this_practice) 
        VALUES 
        ('{$_POST['tribe_id']}', '{$_POST['practice_name']}',
        '{$_POST['description']}', '{$_POST['image']}', '{$_POST['planting_practice']}'
        , '{$_POST['post_harvest_practice']}', '{$_POST['pest_control']}', '{$_POST['tools_or_equipment']}'
        , '{$_POST['cultural_significance']}', '{$_POST['definition_and_characteristics']}', '{$_POST['length_of_practice_period']}'
        , '{$_POST['intervention_and_alternatives']}', '{$_POST['challenges_and_sustainability_of_this_practice']}') 
        RETURNING practice_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $practice_id = $row[0];
        $_SESSION['message'] = "Practice Created Successfully";
        header("Location: practice.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Practice Not Created";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: practice-create.php");
        exit(0);
    }
}

if (isset($_POST['update_practice'])) {
    $practice_id = pg_escape_string($con, $_POST['practice_id']);
    $tribe_id = pg_escape_string($con, $_POST['tribe_id']);
    $practice_name = pg_escape_string($con, $_POST['practice_name']);
    $description = pg_escape_string($con, $_POST['description']);
    $image = pg_escape_string($con, $_POST['image']);
    $planting_practice = pg_escape_string($con, $_POST['planting_practice']);
    $post_harvest_practice = pg_escape_string($con, $_POST['post_harvest_practice']);
    $pest_control = pg_escape_string($con, $_POST['pest_control']);
    $tools_or_equipment = pg_escape_string($con, $_POST['tools_or_equipment']);
    $cultural_significance = pg_escape_string($con, $_POST['cultural_significance']);
    $definition_and_characteristics = pg_escape_string($con, $_POST['definition_and_characteristics']);
    $length_of_practice_period = pg_escape_string($con, $_POST['length_of_practice_period']);
    $intervention_and_alternatives = pg_escape_string($con, $_POST['intervention_and_alternatives']);
    $challenges_and_sustainability_of_this_practice = pg_escape_string($con, $_POST['challenges_and_sustainability_of_this_practice']);

    $query = "UPDATE practice SET 
            tribe_id = '$tribe_id',
            practice_name = '$practice_name',
            description = '$description',
            image = '$image',
            planting_practice = '$planting_practice',
            post_harvest_practice = '$post_harvest_practice',
            pest_control = '$pest_control',
            tools_or_equipment = '$tools_or_equipment',
            cultural_significance = '$cultural_significance',
            definition_and_characteristics = '$definition_and_characteristics',
            length_of_practice_period = '$length_of_practice_period',
            intervention_and_alternatives = '$intervention_and_alternatives',
            challenges_and_sustainability_of_this_practice = '$challenges_and_sustainability_of_this_practice'
            WHERE practice_id = $practice_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Practice Updated Successfully";
        header("Location: practice.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Practice Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: practice.php");
        exit(0);
    }
}

if (isset($_POST['delete_practice'])) {
    $practice_id = pg_escape_string($con, $_POST['delete_practice']);
    $query = "DELETE FROM practice WHERE practice_id='$practice_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Governance Deleted Successfully";
        header("Location: practice.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Governance Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: practice.php");
        exit(0);
    }
}

// crud for Practice table end

// crud for Traditional Usage table start

// crud for Traditional Usage table start

if (isset($_POST['save_traditional_usage'])) {
    // Inserting into traditional usage table
    $query = "INSERT INTO traditional_usage
        (crop_id, culinary_application, medicinal_usage) 
        VALUES 
        ('{$_POST['crop_id']}', '{$_POST['culinary_application']}',
        '{$_POST['medicinal_usage']}') 
        RETURNING traditional_usage";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $traditional_usage_id = $row[0];
        $_SESSION['message'] = "Practice Created Successfully";
        header("Location: traditional_usage.php");
        exit(0);
        // } else {
        //     echo "Error: " . pg_last_error($con);
        //      exit; // Stop further execution
        // }
    } else {
        $_SESSION['message'] = "Practice Not Created";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: traditional_usage-create.php");
        exit(0);
    }
}

if (isset($_POST['update_traditional_usage'])) {
    $traditional_usage_id = pg_escape_string($con, $_POST['traditional_usage_id']);
    $crop_id = pg_escape_string($con, $_POST['crop_id']);
    $culinary_application = pg_escape_string($con, $_POST['culinary_application']);
    $medicinal_usage = pg_escape_string($con, $_POST['medicinal_usage']);

    $query = "UPDATE traditional_usage SET 
            crop_id = '$crop_id',
            culinary_application = '$culinary_application',
            medicinal_usage = '$medicinal_usage'
            WHERE traditional_usage_id = $traditional_usage_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Traditional Usage Updated Successfully";
        header("Location: traditional_usage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Traditional Usage Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: traditional_usage.php");
        exit(0);
    }
}

if (isset($_POST['delete_traditional_usage'])) {
    $traditional_usage_id = pg_escape_string($con, $_POST['delete_traditional_usage']);
    $query = "DELETE FROM traditional_usage WHERE traditional_usage_id='$traditional_usage_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Traditional Usage Deleted Successfully";
        header("Location: traditional_usage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Traditional Usage Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: traditional_usage.php");
        exit(0);
    }
}

// crud for Traditional Usage table end

// crud for Traditional Usage table start

if (isset($_POST['save_common_usage'])) {
    // Inserting into traditional usage table
    $query = "INSERT INTO common_usage
        (crop_id, usage_name, description, image, usage_example) 
        VALUES 
        ('{$_POST['crop_id']}', '{$_POST['usage_name']}', '{$_POST['description']}',
        '{$_POST['image']}', '{$_POST['usage_example']}') 
        RETURNING usage_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $usage_id = $row[0];
        $_SESSION['message'] = "Common Usage Created Successfully";
        header("Location: common_usage.php");
        exit(0);
        // } else {
        //     echo "Error: " . pg_last_error($con);
        //      exit; // Stop further execution
        // }
    } else {
        $_SESSION['message'] = "Common Usage Not Created";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: common_usage-create.php");
        exit(0);
    }
}

if (isset($_POST['update_common_usage'])) {
    $usage_id = pg_escape_string($con, $_POST['usage_id']);
    $crop_id = pg_escape_string($con, $_POST['crop_id']);
    $usage_name = pg_escape_string($con, $_POST['usage_name']);
    $description = pg_escape_string($con, $_POST['description']);
    $image = pg_escape_string($con, $_POST['image']);
    $usage_example = pg_escape_string($con, $_POST['usage_example']);

    $query = "UPDATE common_usage SET 
            crop_id = '$crop_id',
            usage_name = '$usage_name',
            description = '$description',
            image = '$image',
            usage_example = '$usage_example'
            WHERE usage_id = $usage_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Common Usage Updated Successfully";
        header("Location: common_usage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Common Usage Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: common_usage.php");
        exit(0);
    }
}

if (isset($_POST['delete_common_usage'])) {
    $usage_id = pg_escape_string($con, $_POST['delete_common_usage']);
    $query = "DELETE FROM common_usage WHERE usage_id='$usage_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Traditional Usage Deleted Successfully";
        header("Location: common_usage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Traditional Usage Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: common_usage.php");
        exit(0);
    }
}

// crud for Traditional Usage table end

// crud for Morphological Characteristic table start

if (isset($_POST['save_morphological_characteristic'])) {
    // Inserting into Morphological Characteristic table
    $query = "INSERT INTO morphological_characteristic
    (crop_id, plant_height, panicle_length, grain_quality, grain_color, grain_length, grain_width, grain_shape,
    awn_length, leaf_length, leaf_width, leaf_shape, stem_color, another_color) 
    VALUES 
    ('{$_POST['crop_id']}', '{$_POST['plant_height']}', '{$_POST['panicle_length']}',
    '{$_POST['grain_quality']}', '{$_POST['grain_color']}', '{$_POST['grain_length']}',
    '{$_POST['grain_width']}', '{$_POST['grain_shape']}', '{$_POST['awn_length']}', '{$_POST['leaf_length']}',
    '{$_POST['leaf_width']}', '{$_POST['leaf_shape']}', '{$_POST['stem_color']}', '{$_POST['another_color']}') 
    RETURNING morphological_characteristic_id";


    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $usage_id = $row[0];
        $_SESSION['message'] = "Morphological Characteristic Created Successfully";
        header("Location: morphological_characteristic.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Morphological Characteristic Not Created";
        // When an error occurs
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: morphological_characteristic-create.php");
        exit(0);
    }
}

if (isset($_POST['update_morphological_characteristic'])) {
    $morphological_characteristic_id = pg_escape_string($con, $_POST['morphological_characteristic_id']);
    $crop_id = pg_escape_string($con, $_POST['crop_id']);
    $plant_height = pg_escape_string($con, $_POST['plant_height']);
    $panicle_length = pg_escape_string($con, $_POST['panicle_length']);
    $grain_quality = pg_escape_string($con, $_POST['grain_quality']);
    $grain_color = pg_escape_string($con, $_POST['grain_color']);
    $grain_length = pg_escape_string($con, $_POST['grain_length']);
    $grain_width = pg_escape_string($con, $_POST['grain_width']);
    $grain_shape = pg_escape_string($con, $_POST['grain_shape']);
    $awn_length = pg_escape_string($con, $_POST['awn_length']);
    $leaf_length = pg_escape_string($con, $_POST['leaf_length']);
    $leaf_width = pg_escape_string($con, $_POST['leaf_width']);
    $leaf_shape = pg_escape_string($con, $_POST['leaf_shape']);
    $stem_color = pg_escape_string($con, $_POST['stem_color']);
    $another_color = pg_escape_string($con, $_POST['another_color']);

    $query = "UPDATE morphological_characteristic SET 
            crop_id = '$crop_id',
            plant_height = '$plant_height',
            panicle_length = '$panicle_length',
            grain_quality = '$grain_quality',
            grain_color = '$grain_color',
            grain_length = '$grain_length',
            grain_width = '$grain_width',
            grain_shape = '$grain_shape',
            awn_length = '$awn_length',
            leaf_length = '$leaf_length',
            leaf_width = '$leaf_width',
            leaf_shape = '$leaf_shape',
            stem_color = '$stem_color',
            another_color = '$another_color'
            WHERE morphological_characteristic_id = $morphological_characteristic_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Morphological Characteristic Updated Successfully";
        header("Location: morphological_characteristic.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Morphological Characteristic Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: morphological_characteristic-create.php");
        exit(0);
    }
}

if (isset($_POST['delete_morphological_characteristic'])) {
    $morphological_characteristic_id = pg_escape_string($con, $_POST['delete_morphological_characteristic']);
    $query = "DELETE FROM morphological_characteristic WHERE morphological_characteristic_id='$morphological_characteristic_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Morphological Characteristic Deleted Successfully";
        header("Location: morphological_characteristic.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Morphological Characteristic Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: morphological_characteristic.php");
        exit(0);
    }
}

// crud for Morphological Characteristic table end

// crud for Relationship Among Cultivars table start

if (isset($_POST['save_relationship_among_cultivars'])) {
    // Inserting into Morphological Characteristic table
    $query = "INSERT INTO relationship_among_cultivars
    (crop_id, distinct_cultivar_groups_morph_gen, cultivar_relations_cluster_and_pca, 
    hybridization_potential, conservation_and_breeding_implications) 
    VALUES 
    ('{$_POST['crop_id']}', '{$_POST['distinct_cultivar_groups_morph_gen']}', '{$_POST['cultivar_relations_cluster_and_pca']}',
    '{$_POST['hybridization_potential']}', '{$_POST['conservation_and_breeding_implications']}') 
    RETURNING relationship_among_cultivars_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $usage_id = $row[0];
        $_SESSION['message'] = "Relationship Among Cultivars Created Successfully";
        header("Location: relationship_among_cultivars.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Relationship Among Cultivars Not Created";
        // When an error occurs
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: relationship_among_cultivars-create.php");
        exit(0);
    }
}

if (isset($_POST['update_relationship_among_cultivars'])) {
    $relationship_among_cultivars_id = pg_escape_string($con, $_POST['relationship_among_cultivars_id']);
    $crop_id = pg_escape_string($con, $_POST['crop_id']);
    $distinct_cultivar_groups_morph_gen = pg_escape_string($con, $_POST['distinct_cultivar_groups_morph_gen']);
    $cultivar_relations_cluster_and_pca = pg_escape_string($con, $_POST['cultivar_relations_cluster_and_pca']);
    $hybridization_potential = pg_escape_string($con, $_POST['hybridization_potential']);
    $conservation_and_breeding_implications = pg_escape_string($con, $_POST['conservation_and_breeding_implications']);

    $query = "UPDATE relationship_among_cultivars SET 
            crop_id = '$crop_id',
            distinct_cultivar_groups_morph_gen = '$distinct_cultivar_groups_morph_gen',
            cultivar_relations_cluster_and_pca = '$cultivar_relations_cluster_and_pca',
            hybridization_potential = '$hybridization_potential',
            conservation_and_breeding_implications = '$conservation_and_breeding_implications'
            WHERE relationship_among_cultivars_id = $relationship_among_cultivars_id";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Relationship Among Cultivars Updated Successfully";
        header("Location: relationship_among_cultivars.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Relationship Among Cultivars Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: relationship_among_cultivars-create.php");
        exit(0);
    }
}

if (isset($_POST['delete_relationship_among_cultivars'])) {
    $relationship_among_cultivars_id = pg_escape_string($con, $_POST['delete_relationship_among_cultivars']);
    $query = "DELETE FROM relationship_among_cultivars WHERE relationship_among_cultivars_id='$relationship_among_cultivars_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Relationship Among Cultivars Deleted Successfully";
        header("Location: relationship_among_cultivars.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Relationship Among Cultivars Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: relationship_among_cultivars.php");
        exit(0);
    }
}

// crud for Relationship Among Cultivars table end

// crud for Traditional Crop Traits table start

if (isset($_POST['save_traditional_crop_traits'])) {
    // Inserting into Morphological Characteristic table
    $query = "INSERT INTO traditional_crop_traits
    (crop_id, flavor, scent, maturation, drought_tolerance, environment_adaptability, culinary_quality, nutritional_value) 
    VALUES 
    ('{$_POST['crop_id']}', '{$_POST['flavor']}', '{$_POST['scent']}',
    '{$_POST['maturation']}', '{$_POST['drought_tolerance']}', '{$_POST['environment_adaptability']}', '{$_POST['culinary_quality']}',
    '{$_POST['nutritional_value']}') 
    RETURNING traditional_crop_traits_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $usage_id = $row[0];
        $_SESSION['message'] = "Traditional Crop Traits Created Successfully";
        header("Location: traditional_crop_traits.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Traditional Crop Traits Not Created";
        // When an error occurs
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: traditional_crop_traits-create.php");
        exit(0);
    }
}

if (isset($_POST['update_traditional_crop_traits'])) {
    $traditional_crop_traits_id = pg_escape_string($con, $_POST['traditional_crop_traits_id']);
    $crop_id = pg_escape_string($con, $_POST['crop_id']);
    $flavor = pg_escape_string($con, $_POST['flavor']);
    $scent = pg_escape_string($con, $_POST['scent']);
    $maturation = pg_escape_string($con, $_POST['maturation']);
    $drought_tolerance = pg_escape_string($con, $_POST['drought_tolerance']);
    $environment_adaptability = pg_escape_string($con, $_POST['environment_adaptability']);
    $culinary_quality = pg_escape_string($con, $_POST['culinary_quality']);
    $nutritional_value = pg_escape_string($con, $_POST['nutritional_value']);

    $query = "UPDATE traditional_crop_traits SET 
            crop_id = '$crop_id',
            flavor = '$flavor',
            scent = '$scent',
            maturation = '$maturation',
            drought_tolerance = '$drought_tolerance',
            environment_adaptability = '$environment_adaptability',
            culinary_quality = '$culinary_quality',
            nutritional_value = '$nutritional_value'
            WHERE traditional_crop_traits_id = $traditional_crop_traits_id";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Traditional Crop Traits Updated Successfully";
        header("Location: traditional_crop_traits.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Traditional Crop Traits Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: traditional_crop_traits-create.php");
        exit(0);
    }
}

if (isset($_POST['delete_traditional_crop_traits'])) {
    $traditional_crop_traits_id = pg_escape_string($con, $_POST['delete_traditional_crop_traits']);
    $query = "DELETE FROM traditional_crop_traits WHERE traditional_crop_traits_id='$traditional_crop_traits_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Traditional Crop Traits Deleted Successfully";
        header("Location: traditional_crop_traits.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Traditional Crop Traits Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: traditional_crop_traits.php");
        exit(0);
    }
}

// crud for Traditional Crop Traits table end

// crud for Ritual table start

if (isset($_POST['save_ritual'])) {
    // Inserting into Morphological Characteristic table
    $query = "INSERT INTO ritual
    (tribe_id, ritual_name, ritual_purpose, ritual_timing, ritual_participants, ritual_items) 
    VALUES 
    ('{$_POST['tribe_id']}', '{$_POST['ritual_name']}', '{$_POST['ritual_purpose']}',
    '{$_POST['ritual_timing']}', '{$_POST['ritual_participants']}', '{$_POST['ritual_items']}') 
    RETURNING ritual_id";

    $query_run = pg_query($con, $query);

    if ($query_run) {
        $row = pg_fetch_row($query_run);
        $usage_id = $row[0];
        $_SESSION['message'] = "Ritual Traits Created Successfully";
        header("Location: ritual.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Ritual Traits Not Created";
        // When an error occurs
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: ritual-create.php");
        exit(0);
    }
}

if (isset($_POST['update_ritual'])) {
    $ritual_id = pg_escape_string($con, $_POST['ritual_id']);
    $tribe_id = pg_escape_string($con, $_POST['tribe_id']);
    $ritual_name = pg_escape_string($con, $_POST['ritual_name']);
    $ritual_purpose = pg_escape_string($con, $_POST['ritual_purpose']);
    $ritual_timing = pg_escape_string($con, $_POST['ritual_timing']);
    $ritual_participants = pg_escape_string($con, $_POST['ritual_participants']);
    $ritual_items = pg_escape_string($con, $_POST['ritual_items']);

    $query = "UPDATE ritual SET 
            tribe_id = '$tribe_id',
            ritual_name = '$ritual_name',
            ritual_purpose = '$ritual_purpose',
            ritual_timing = '$ritual_timing',
            ritual_participants = '$ritual_participants',
            ritual_items = '$ritual_items'
            WHERE ritual_id = $ritual_id";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Traditional Crop Traits Updated Successfully";
        header("Location: ritual.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Traditional Crop Traits Update Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: ritual-create.php");
        exit(0);
    }
}

if (isset($_POST['delete_ritual'])) {
    $ritual_id = pg_escape_string($con, $_POST['delete_ritual']);
    $query = "DELETE FROM ritual WHERE ritual_id='$ritual_id'";
    $query_run = pg_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Ritual Deleted Successfully";
        header("Location: ritual.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Ritual Deletion Failed";
        $_SESSION['message_type'] = 'error';
        $_SESSION['error_details'] = pg_last_error($con);
        header("Location: ritual.php");
        exit(0);
    }
}

// crud for Ritual table end