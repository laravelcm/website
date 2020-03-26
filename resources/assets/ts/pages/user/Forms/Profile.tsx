import React, { useState } from "react";
import { usePage } from "@inertiajs/inertia-react";

export default () => {
  const { auth: { user }, errors } = usePage();
  console.log(errors);
  const [picture, setPicture] = useState(user.picture);
  const [values, setValues] = useState({
    username: user.username,
    biography: "",
  });

  function handleChange(e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) {
    const { name, value } = e.target;

    // eslint-disable-next-line no-shadow
    setValues((values) => ({
      ...values,
      [name]: value,
    }));
  }

  function updatePhoto() {
    setPicture(user.picture);
  }

  function handleSubmit(e: React.SyntheticEvent) {
    e.preventDefault();
  }

  return (
    <div>
      <div className="md:grid md:grid-cols-3 md:gap-6">
        <div className="md:col-span-1">
          <div className="px-4 sm:px-0">
            <h3 className="text-lg font-medium leading-6 text-gray-900">Profil</h3>
            <p className="mt-1 text-sm leading-5 text-gray-500">
              Ces informations seront affichées publiquement, alors faites attention à ce que vous partagez.
            </p>
          </div>
        </div>
        <div className="mt-5 md:mt-0 md:col-span-2">
          <form onSubmit={handleSubmit}>
            <div className="shadow sm:rounded-md sm:overflow-hidden">
              <div className="px-4 py-5 bg-white sm:p-6">
                <div>
                  <label htmlFor="photo" className="block text-sm leading-5 font-medium text-gray-700">Photo</label>
                  <div className="mt-2 flex items-center">
                    <span className="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                      <img className="h-full w-full rounded-full" src={picture} alt={user.full_name} />
                    </span>
                    <span className="ml-5 rounded-md shadow-sm">
                      <button
                        type="button"
                        className="py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-brand-200 focus:shadow-outline-brand active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out"
                        onClick={updatePhoto}
                      >
                        Changer
                      </button>
                    </span>
                  </div>
                </div>

                <div className="grid grid-cols-3 gap-6 mt-6">
                  <div className="col-span-3">
                    <label htmlFor="username" className="block text-sm font-medium leading-5 text-gray-700">Pseudo (Nom d'utilisateur)</label>
                    <div className="mt-2 flex w-full rounded-md shadow-sm">
                      <span className="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        laravelcm.com/u/@
                      </span>
                      <input
                        id="username"
                        className="form-input flex-1 block w-full focus:shadow-outline-brand focus:border-brand-200 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                        name="username"
                        value={values.username}
                        onChange={handleChange}
                      />
                    </div>
                  </div>
                </div>

                <div className="mt-6">
                  <label htmlFor="about" className="block text-sm leading-5 font-medium text-gray-700">Bio</label>
                  <div className="mt-2 rounded-md shadow-sm">
                    <textarea
                      id="about"
                      rows={3}
                      className="form-textarea mt-1 block w-full focus:shadow-outline-brand focus:border-brand-200 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      placeholder="Quelques mots sur vous..."
                      value={values.biography}
                      onChange={handleChange}
                    />
                  </div>
                  <p className="mt-2 text-sm text-gray-500">Brève description de votre profil. Les URL sont liées par un lien hypertexte.</p>
                </div>
              </div>
              <div className="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <span className="inline-flex rounded-md shadow-sm">
                  <button type="submit" className="inline-flex justify-center btn btn-primary text-sm">Enrégistrer</button>
                </span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};
