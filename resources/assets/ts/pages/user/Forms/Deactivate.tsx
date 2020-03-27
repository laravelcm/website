import React from "react";

export default ({ onClick }: { onClick: () => void }) => (
  <div className="mt-10 sm:mt-0">
    <div className="md:grid md:grid-cols-3 md:gap-6">
      <div className="md:col-span-1">
        <div className="px-4 sm:px-0">
          <h3 className="text-lg font-medium leading-6 text-gray-900">Zone Dangereuse</h3>
          <p className="mt-1 text-sm leading-5 text-gray-500">
            Zone à risque, vous pouvez desactiver votre compte en cliquant sur le bouton indiqué.
          </p>
        </div>
      </div>
      <div className="mt-5 md:mt-0 md:col-span-2">
        <div className="shadow overflow-hidden sm:rounded-md border border-red-300">
          <div className="bg-white">
            <div className="px-4 py-5 sm:p-6">
              <h3 className="text-lg leading-6 font-medium text-gray-900">Désactiver mon compte</h3>
              <div className="mt-2 text-sm leading-5 text-gray-500">
                <p>
                  Une fois votre compte désactiver, si vous ne vous êtes pas connecté pendant les 30 prochains jours,{" "}
                  vous perdrez toutes les données qui lui sont associées et il sera définitivement supprimé.
                </p>
              </div>
              <div className="mt-5">
                <button
                  type="button"
                  className="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-50 focus:outline-none focus:border-red-300 focus:shadow-outline-red active:bg-red-200 transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                  onClick={onClick}
                >
                  Désactiver
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
);
