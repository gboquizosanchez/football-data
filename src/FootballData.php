<?php

namespace Grambas\FootballData;

use GuzzleHttp\Client;

class FootballData
{
    /**
     * GuzzleHttp Client instance.
     *
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * FootballData constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Gets all competitions or a specific one;
     *
     * @param int|null $id
     * @return object
     */
    protected function getLeagues(string $id = "", string $area = ""): object
    {
        return json_decode($this->client->get("competitions/{$id}/?areas={$area}")->getBody());
    }

    /**
     * Gets all teams for a specific competition.
     *
     * @param $id
     * @return object
     */
    protected function getLeagueTeams(string $id = "", string $stage = ""): object
    {
        return json_decode($this->client->get("competitions/{$id}/teams/?stage={$stage}")->getBody());
    }

    /**
     * Gets all availables competitions.
     *
     * @param int $area
     * @return object
     */
    public function allCompetitions(string $area = ""): object
    {
        return $this->getLeagues("", $area);
    }

    /**
     * Gets all matches for a specific competition.
     * All filters availables with array parameter.
     *
     * @param int $id
     * @param array $filter
     * @return object
     */
    public function allMatches(int $id, array $filter = []): object
    {
        $url = "competitions/{$id}/matches/?";

        foreach ($filter as $key => $value) {
            $url .= "{$key}={$value}&";
        }

        return json_decode($this->client->get($url)->getBody());
    }

    /**
     * All matches for a specific team.
     * All filters availables with array parameter.
     *
     * @param int $id
     * @param array $filter
     * @return object
     */
    public function allMatchesForTeam(int $id, array $filter): object
    {
        $url = "team/{$id}/matches/?";

        foreach ($filter as $key => $value) {
            $url .= "{$key}={$value}&";
        }

        return json_decode($this->client->get($url)->getBody());
    }

    /**
     * Gets all teams for a specific competition.
     *
     * @param int $id
     * @param string $stage
     * @return object
     */
    public function allTeams(int $id, string $stage = ""): object
    {
        return $this->getLeagueTeams($id, $stage);
    }

    /**
     * Gets a specific competition.
     *
     * @param int $id
     * @return object
     */
    public function findCompetition(int $id): object
    {
        return $this->getLeagues($id);
    }

    /**
     * Gets standings for a specific competition.
     *
     * @param int $id
     * @return object
     */
    public function findStandings(int $id): object
    {
        return json_decode($this->client->get("competitions/{$id}/standings")->getBody());
    }

    /**
     * All matches with all available filter in array parameter.
     *
     * @param array $filter
     * @return object
     */
    public function findFilteredMatch(array $filter): object
    {
        $url = "matches/?";

        foreach ($filter as $key => $value) {
            $url .= "{$key}={$value}&";
        }

        return json_decode($this->client->get($url)->getBody());
    }

    /**
     * Shows one particular match.
     *
     * @param int $id
     * @return object
     */
    public function findMatch(int $id): object
    {
        return json_decode($this->client->get("matches/{$id}")->getBody());
    }

    /**
     * Gets a specific team.
     *
     * @param int $id
     * @return object
     */
    public function findTeam(int $id): object
    {
        return json_decode($this->client->get("teams/{$id}")->getBody());
    }

    /**
     * Gets all squad for a specific team.
     *
     * @param int $id
     * @return array
     */
    public function findTeamSquad(int $id): array
    {
        return json_decode($this->client->get("teams/{$id}")->getBody())->squad;
    }
}
