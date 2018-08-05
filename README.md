# FootballData


[football-data.org](http://football-data.org) API Container for Laravel 5.5 or ^


## Requirements
-  "guzzlehttp/guzzle": "~6.0"


## Install

Via Composer

``` bash
$ composer require football/football-data
```

## Usage

More about filters, structure and API in:
[Football Data Documentation](https://www.football-data.org/documentation/quickstart)


Add your api key to env. file

```
FootballData_API_KEY={YOUR_API_KEY}
```
Add to config/app.php 
```

'providers' => [
    Grambas\FootballData\FootballDataServiceProvider::class,
]

'aliases' => [
    'Football' => Grambas\FootballData\Facades\FootballDataFacade::class,
]
```

## Examples

All competitions availables. 
Can be added optional area filter in this method.

```
Football::allCompetitions(); 		
Football::allCompetitions(string $area); 		
```	

Matches for a specified competition. 
Availables all filters in array variable.

```
Football::allMatches(int $id); 		
Football::allMatches(int $id, array $filters); 		
```	

Matches for a specified team.
Availables all filters in array variable.

```
Football::allMatchesForTeam(int $id);
Football::allMatchesForTeam(int $id, array $filters);
``` 

Teams for the especified competition.
Can be added optional stage filter in this method.

```
Football::allTeams(int $id);
Football::allTeams(int $id, string $stage);
```

A particular competition.

```
Football::findCompetition($id);
```

Standing for a specific competition given.

```
Football::findStandings($id);
```

Matches with specified filters.

```
Football::findFilteredMatch(array $filters);
```

Specific match.

```
Football::findMatch(int $id);
```

One team.

```
Football::findTeam(int $id);
```

Squad for a team.
(This method returns an array instead object).

```
Football::findTeamSquad(int $id)
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-packagist]: https://packagist.org/packages/grambas/football-data
[link-author]: https://github.com/grambas
