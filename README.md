rc_published
============

An ExpressionEngine plugin that allows you to check if the current user has published an entry in a given channel


# Parameters
- **channel_id**: A single channel ID (no piped values in this version) for the channels you want to check against

# Returns
- **true**: if the member has published an entry in your channel
- **false**: if they have not

# Example
{exp:rc_published channel_id="4"}
