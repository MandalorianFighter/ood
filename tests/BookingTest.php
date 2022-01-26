<?php

namespace Ood\Tests;

use PHPUnit\Framework\TestCase;
use Ood\Booking;

class BookingTest extends TestCase
{

    public function testBooking(): void
    {
        $booking = new Booking();

        $result1 = $booking->book('11-11-2008', '13-11-2008');
        $this->assertTrue($result1);

        $result2 = $booking->book('12-11-2008', '12-11-2008');
        $this->assertFalse($result2);

        $result3 = $booking->book('10-11-2008', '12-11-2008');
        $this->assertFalse($result3);

        $result4 = $booking->book('12-11-2008', '14-11-2008');
        $this->assertFalse($result4);

        $result5 = $booking->book('10-11-2008', '11-11-2008');
        $this->assertTrue($result5);

        $result6 = $booking->book('13-11-2008', '14-11-2008');
        $this->assertTrue($result6);

        $result7 = $booking->book('08-11-2008', '18-11-2008');
        $this->assertFalse($result7);
    }
}
