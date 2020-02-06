import React from "react";
import Helmet from "react-helmet";

interface Props {
  title: string;
  description?: string;
  lang?: string;
  meta?: any;
}

const Seo =  ({ title, description, lang, meta }: Props) => {
  const metaDescription = description || "Bienvenue sur le site de la communauté des développeurs PHP et Laravel du Cameroun, le plus gros rassemblement de développeurs au Cameroun.";

  return (
    <Helmet
      htmlAttributes={{ lang }}
      title={title}
      titleTemplate="%s - Laravel Cameroun"
      meta={[
        {
          name: `description`,
          content: metaDescription,
        },
        {
          property: `og:title`,
          content: title,
        },
        {
          property: `og:description`,
          content: metaDescription,
        },
        {
          property: `og:type`,
          content: `website`,
        },
        {
          name: `twitter:card`,
          content: `summary`,
        },
        {
          name: `twitter:creator`,
          content: `@laravelcm`,
        },
        {
          name: `twitter:title`,
          content: title,
        },
        {
          name: `twitter:description`,
          content: metaDescription,
        },
        {
          name: `keywords`,
          content: `Laravel, Cameroun, Developers, Community`,
        },
      ].concat(meta)}
    />
  );
};

Seo.defaultProps = {
  lang: `fr`,
  meta: [],
  description: ``,
};

export default Seo;
