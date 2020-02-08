import React, { useState, useEffect } from "react";
import { usePage } from "@inertiajs/inertia-react";

export default () => {
  const [visible, setVisible] = useState(true);
  const { flash, errors } = usePage();
  const numOfErrors = Object.keys(errors).length;

  useEffect(() => {
    setVisible(true);
  }, [flash, errors]);

  return (
    <>
      {flash.success && visible && (
        <div className="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md max-w-3xl mb-6" role="alert">
          <div className="flex">
            <div className="py-1">
              <svg className="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <polygon points="0 11 2 9 7 14 18 3 20 5 7 18" />
              </svg>
            </div>
            <div>
              <p className="font-bold">Félicitation !</p>
              <p className="text-sm">{flash.success}</p>
            </div>
          </div>
        </div>
      )}
      {(flash.error || numOfErrors > 0) && visible && (
        <div className="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md max-w-3xl mb-6" role="alert">
          <div className="flex">
            <div className="py-1">
              <svg className="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66zm9.9-8.49L11.41 10l2.83 2.83-1.41 1.41L10 11.41l-2.83 2.83-1.41-1.41L8.59 10 5.76 7.17l1.41-1.41L10 8.59l2.83-2.83 1.41 1.41z" />
              </svg>
            </div>
            <div>
              <p className="font-bold">Erreur !</p>
              <p className="text-sm">
                {flash.error && flash.error}
                {numOfErrors === 1 && 'Vous avez une erreur dans le formulaire.'}
                {numOfErrors > 1 && `Il y'a ${numOfErrors} erreurs dans le formulaire.`}
              </p>
            </div>
          </div>
        </div>
      )}
    </>
  );
};
