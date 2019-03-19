<?php

namespace App\Models\Traits\User;

use App\Models\Course;
use App\Models\CourseEnrollRecord;

trait UserAttributes
{
    /**
     * Check whether user is email-verified.
     *
     * @return bool
     */
    public function isVerified()
    {
        return $this->email_verified_at != null;
    }

    /**
     * Check whether user is activated.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->activated_at != null;
    }

    /**
     * Get HTML element of user avatar.
     *
     * @return string
     */
    public function getAvatarImage()
    {
        return "<img style='height: 32px; width: 32px;' src='"
            . $this->getAvatarURL() . "' alt='' />";
    }

    /**
     * Get the URL of avatar.
     *
     * @return string
     */
    public function getAvatarURL()
    {
        switch ($this->avatar_type) {
            case "github":
                {
                    return $this->avatar_github;
                }
            case "upload":
                {
                    return $this->avatar_upload;
                }
            case "gravatar":
            default:
                {
                    return "https://www.gravatar.com/avatar/"
                        . md5( strtolower( trim( $this->email ) ) )
                        . "?d=" . urlencode( "identicon" );
                }
        }
    }

    /**
     * Check whether a user is in course.
     *
     * @param Course $course
     * @return bool
     */
    public function isInCourse(Course $course)
    {
        return CourseEnrollRecord::query()
            ->where('user_id', $this->id)
            ->where('course_id', $course->id)
            ->exists();
    }

    /**
     * Check whether a user is admin of a course.
     *
     * @param Course $course
     * @return bool
     */
    public function isCourseAdmin(Course $course)
    {
        return CourseEnrollRecord::query()
            ->where('user_id', $this->id)
            ->where('course_id', $course->id)
            ->where('type_is_admin', true)
            ->exists();
    }
}