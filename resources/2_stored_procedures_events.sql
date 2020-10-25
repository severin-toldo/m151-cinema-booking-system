USE m151_cinema_booking_system;

/*
	ENABLE SCHEDULER
*/
SELECT @@global.event_scheduler;
SET GLOBAL event_scheduler = ON;

/*
	STORED PROCEDURE
*/
DELIMITER $$

DROP PROCEDURE IF EXISTS updateOutdatedPresentationsAndReservations;
CREATE PROCEDURE updateOutdatedPresentationsAndReservations ()
BEGIN
	UPDATE presentation SET valid = false WHERE start_time < NOW();

    UPDATE reservation r
	INNER JOIN presentation p ON p.id = r.presentation_id and p.valid = false
	SET r.valid = false;
END;

/*
	EVENT
*/
DROP EVENT IF EXISTS updateOutdatedPresentationsAndReservationsEvent;

DELIMITER $$

CREATE EVENT updateOutdatedPresentationsAndReservationsEvent ON SCHEDULE EVERY 1 HOUR STARTS NOW() DO call updateOutdatedPresentationsAndReservations();




