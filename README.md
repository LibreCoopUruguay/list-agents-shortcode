# list-agents-shortcode
WordPress plugin para listar agentes culturais

# Como usar

Para listar agentes denro de uma página ou post utilize o shortcode "list_agents" com atributos e valores para filtrar o resultado.

Exemplo:

```
[list_agents atributo=valor]
```

## Opções de filtro

### Por tag

```
[list_agents tag=plandecirculacion]
```

### Por departamento

```
[list_agents departamento=Montevideo]
```

### Por IDs

Uma lista de IDs separadas por vírugla, sem espaços

```
[list_agents ids="101,239,344,355"]
```

### Por Selos

Uma lista de IDs dos selos separadas por vírugla, sem espaços

```
[list_agents seals="2,3,4"]
```

### Por tipo de espaço

O ID do tipo

```
[list_agents type=30]
```

consulte os ids dos tipo em: https://github.com/LibreCoopUruguay/mapasculturais-culturaenlinea/blob/master/agent-types.php

### Combinando filtros

É possível combinar os filtros

```
Retorna os agentes de montevideo com a tag plandecirculacion
[list_agents departamento=Montevideo tag=plandecirculacion]
```
