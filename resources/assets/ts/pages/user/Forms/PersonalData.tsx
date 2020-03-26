import React, { useState } from "react";
import { usePage } from "@inertiajs/inertia-react";

export default () => {
  const { auth: { user }, errors } = usePage();
  console.log(errors);
  const [values, setValues] = useState({
    first_name: user.first_name,
    last_name: user.last_name,
  });

  function handleChange(e: React.ChangeEvent<HTMLInputElement>) {
    const key = e.target.name;
    const value = e.target.type === "checkbox" ? e.target.checked : e.target.value;

    // eslint-disable-next-line no-shadow
    setValues((values) => ({
      ...values,
      [key]: value,
    }));
  }

  function handleSubmit(e: React.SyntheticEvent) {
    e.preventDefault();
  }

  return (
    <div className="mt-10 sm:mt-0">
      <div className="md:grid md:grid-cols-3 md:gap-6">
        <div className="md:col-span-1">
          <div className="px-4 sm:px-0">
            <h3 className="text-lg font-medium leading-6 text-gray-900">Informations Personelles</h3>
            <p className="mt-1 text-sm leading-5 text-gray-500">
              Ces informations sont en rapport avec votre compte et permet de facilement vous retrouvez en cas de besoin.
            </p>
          </div>
        </div>
        <div className="mt-5 md:mt-0 md:col-span-2">
          <form onSubmit={handleSubmit}>
            <div className="shadow overflow-hidden sm:rounded-md">
              <div className="px-4 py-5 bg-white sm:p-6">
                <div className="grid grid-cols-6 gap-6">
                  <div className="col-span-6 sm:col-span-3">
                    <label htmlFor="first_name" className="block text-sm font-medium leading-5 text-gray-700">Prénom</label>
                    <input
                      id="first_name"
                      className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      name="first_name"
                      value={values.first_name}
                      onChange={handleChange}
                    />
                  </div>

                  <div className="col-span-6 sm:col-span-3">
                    <label htmlFor="last_name" className="block text-sm font-medium leading-5 text-gray-700">Nom</label>
                    <input
                      id="last_name"
                      className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      name="last_name"
                      value={values.last_name}
                      onChange={handleChange}
                    />
                  </div>

                  <div className="col-span-6">
                    <label htmlFor="email_address" className="block text-sm font-medium leading-5 text-gray-700">Adresse Email</label>
                    <input
                      id="email_address"
                      className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm disabled:bg-gray-100 cursor-not-allowed focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      value={user.email}
                      disabled
                    />
                  </div>

                  <div className="col-span-6">
                    <label htmlFor="country" className="block text-sm font-medium leading-5 text-gray-700">Pays / Region</label>
                    <select id="country" className="mt-2 block form-select w-full py-2 px-3 py-0 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                      <option>United States</option>
                      <option>Canada</option>
                      <option>Mexico</option>
                    </select>
                  </div>

                  <div className="col-span-6">
                    <label htmlFor="street_address" className="block text-sm font-medium leading-5 text-gray-700">Adresse complète</label>
                    <input id="street_address" className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>

                  <div className="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label htmlFor="city" className="block text-sm font-medium leading-5 text-gray-700">Ville</label>
                    <input id="city" className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>

                  <div className="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label htmlFor="state" className="block text-sm font-medium leading-5 text-gray-700">Etat / Province</label>
                    <input id="state" className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>

                  <div className="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label htmlFor="postal_code" className="block text-sm font-medium leading-5 text-gray-700">ZIP / Postal</label>
                    <input id="postal_code" className="mt-2 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                </div>
              </div>
              <div className="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" className="inline-flex justify-center btn btn-primary text-sm">Enrégistrer</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};
