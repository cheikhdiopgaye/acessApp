<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerHFvpSqJ\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerHFvpSqJ/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerHFvpSqJ.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerHFvpSqJ\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerHFvpSqJ\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'HFvpSqJ',
    'container.build_id' => '65dcb741',
    'container.build_time' => 1581635836,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerHFvpSqJ');