import React from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";

import Transition from "@/components/Transition";

export default ({ show, onClose, message }: { show: boolean; onClose: () => void; message: string }) => {
  const { auth: { user } } = usePage();

  return (
    <Transition show={show}>
      <div className="fixed z-100 inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
        <Transition
          enter="transform ease-out duration-300 transition"
          enterFrom="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
          enterTo="translate-y-0 opacity-100 sm:translate-x-0"
          leave="transition ease-in duration-100"
          leaveFrom="opacity-100"
          leaveTo="opacity-0"
        >
          <div className="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto">
            <div className="rounded-lg shadow-xs overflow-hidden">
              <div className="p-4">
                <div className="flex items-start">
                  <div className="w-0 flex-1 flex justify-between">
                    <p className="w-0 flex-1 text-sm leading-5 font-medium text-gray-900">
                      {message}
                    </p>
                    {!user && (
                      <InertiaLink href="/login" className="ml-3 flex-shrink-0 text-sm leading-5 font-medium text-brand-primary hover:text-brand-900 focus:outline-none focus:underline transition ease-in-out duration-150">
                        Connexion
                      </InertiaLink>
                    )}
                  </div>
                  <div className="ml-4 flex-shrink-0 flex">
                    <button onClick={onClose} className="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                      <svg className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </Transition>
      </div>
    </Transition>
  );
};
