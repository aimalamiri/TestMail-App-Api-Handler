import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {Head, Link} from '@inertiajs/react';
import {useEffect, useState} from "react";

export default function Show({email}) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    {email.to}
                </h2>
            }
        >
            <Head title="Emails"/>

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div
                            className="p-6 bg-white border-b border-gray-200">
                            <Link>
                                <div className="px-4">
                                    <div className="text-gray-400 leading-7 flex justify-between">
                                        {email.from}
                                    </div>
                                    <div className="text-lg text-gray-600 leading-7 font-semibold">
                                        {email.subject}
                                    </div>
                                </div>
                            </Link>
                        </div>
                        <div
                            className="p-6 bg-white border-b border-gray-200"
                            dangerouslySetInnerHTML={{__html: email.html}}
                        >
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
