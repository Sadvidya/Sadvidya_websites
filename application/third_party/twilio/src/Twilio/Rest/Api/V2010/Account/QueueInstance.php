<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\Deserialize;
use Twilio\Rest\Api\V2010\Account\Queue\MemberList;


/**
 * @property \DateTime|null $dateUpdated
 * @property int|null $currentSize
 * @property string|null $friendlyName
 * @property string|null $uri
 * @property string|null $accountSid
 * @property int|null $averageWaitTime
 * @property string|null $sid
 * @property \DateTime|null $dateCreated
 * @property int|null $maxSize
 */
class QueueInstance extends InstanceResource
{
    protected $_members;

    /**
     * Initialize the QueueInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that will create the resource.
     * @param string $sid The Twilio-provided string that uniquely identifies the Queue resource to delete
     */
    public function __construct(Version $version, array $payload, string $accountSid, string $sid = null)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'currentSize' => Values::array_get($payload, 'current_size'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'uri' => Values::array_get($payload, 'uri'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'averageWaitTime' => Values::array_get($payload, 'average_wait_time'),
            'sid' => Values::array_get($payload, 'sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'maxSize' => Values::array_get($payload, 'max_size'),
        ];

        $this->solution = ['accountSid' => $accountSid, 'sid' => $sid ?: $this->properties['sid'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return QueueContext Context for this QueueInstance
     */
    protected function proxy(): QueueContext
    {
        if (!$this->context) {
            $this->context = new QueueContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Delete the QueueInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool
    {

        return $this->proxy()->delete();
    }

    /**
     * Fetch the QueueInstance
     *
     * @return QueueInstance Fetched QueueInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): QueueInstance
    {

        return $this->proxy()->fetch();
    }

    /**
     * Update the QueueInstance
     *
     * @param array|Options $options Optional Arguments
     * @return QueueInstance Updated QueueInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): QueueInstance
    {

        return $this->proxy()->update($options);
    }

    /**
     * Access the members
     */
    protected function getMembers(): MemberList
    {
        return $this->proxy()->members;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.QueueInstance ' . \implode(' ', $context) . ']';
    }
}
