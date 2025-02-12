<?php //376f98ef5f1948a929eaa71661f3dbea
/** @noinspection all */

namespace Illuminate\Bus {

    use Illuminate\Foundation\Bus\PendingDispatch;

    /**
     * @method static PendingDispatch dispatch(PendingBatch $batch)
     * @method static mixed dispatchSync(PendingBatch $batch)
     */
    class ChainedBatch {}
}

namespace Illuminate\Foundation\Console {

    use Illuminate\Foundation\Bus\PendingDispatch;

    /**
     * @method static PendingDispatch dispatch(array $data)
     * @method static mixed dispatchSync(array $data)
     */
    class QueuedCommand {}
}

namespace Illuminate\Foundation\Events {

    use Illuminate\Broadcasting\PendingBroadcast;

    /**
     * @method static void dispatch(array $stubs)
     * @method static PendingBroadcast broadcast(array $stubs)
     */
    class PublishingStubs {}
}

namespace Illuminate\Queue {

    use Illuminate\Foundation\Bus\PendingDispatch;
    use Laravel\SerializableClosure\SerializableClosure;

    /**
     * @method static PendingDispatch dispatch(SerializableClosure $closure)
     * @method static mixed dispatchSync(SerializableClosure $closure)
     */
    class CallQueuedClosure {}
}
