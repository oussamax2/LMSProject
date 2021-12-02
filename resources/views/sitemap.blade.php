<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>2021-05-31T15:19:53+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
        </url>
        <url>
        <loc>{{ url('/list_sessions') }}</loc>
        <lastmod>2021-05-31T15:19:53+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
        </url>
        <url>
        <loc>{{ url('/partners') }}</loc>
        <lastmod>2021-05-31T15:19:53+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
        </url>
        <url>
        <loc>{{ url('/contact') }}</loc>
        <lastmod>2021-05-31T15:19:53+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
        </url>
    @foreach ($maps as $map)
        <url>
            <loc>{{ url('/') }}/{{ $map->slug }}</loc>
            <lastmod>{{ $map->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    @foreach ($companies as $companie)
    <url>
        <loc>{{ url('/') }}/profilecompany/{{ $companie->id }}</loc>
        <lastmod>{{ $companie->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
</urlset>
