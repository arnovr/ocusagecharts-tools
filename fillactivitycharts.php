<?php
/**
 * This script just fills up the table oc_uc_storageusage for some basic testing
 */

include('../config/config.php');
$connect = mysqli_connect('localhost', $CONFIG['dbuser'], $CONFIG['dbpassword'], 'owncloud');

$usernames = array('admin', 'test1', 'test2', 'test3');

$now = new \DateTime();;
foreach(array(2012,2013,2014) as $year)
{
    for($i = 1; $i < 13; $i++)
    {
        for($j = 1; $j < 31; $j++)
        {
            $created = new \DateTime();
            $created->setDate($year, $i, $j);
            if ( $now < $created)
            {
                exit;
            }
            foreach($usernames as $username)
            {
                $subject = 'created_self';
                $subjectCount = rand(0,10);
                for($k = 0; $k < $subjectCount; $k++)
                {
                    $sql = 'INSERT INTO oc_activity(timestamp, user, subject) VALUES ("'. $created->getTimestamp() . '", "' . $username . '", "' . $subject . '");';
                    $result = mysqli_query($connect, $sql);
                }
            }
        }
    }
}

