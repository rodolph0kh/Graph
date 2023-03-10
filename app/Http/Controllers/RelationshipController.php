<?php

namespace App\Http\Controllers;

use App\Models\Node;
use App\Models\Relationship;
use Illuminate\Http\Request;
use App\Http\Requests\HandleStoreRelationshipRequest;

class RelationshipController extends Controller
{
    public function retreiveAllRelationships()
    {
        return Relationship::all();
    }

    public function retreiveRelationshipByType(Request $request)
    {
        $relationships = Relationship::where('type', $request->type)->get();

        return $relationships ?? response()->json(['error' => 'Relationship Type not found'], 400);
    }

    public function store(HandleStoreRelationshipRequest $handleStoreRelationshipRequest)
    {
        if($handleStoreRelationshipRequest->get('directed')) {
            $sourceId = Node::where('name', $handleStoreRelationshipRequest->get('source'))->first()->id;
            $destinationId = Node::where('name', $handleStoreRelationshipRequest->get('destination'))->first()->id;
        } else {
            $sourceId = null;
            $destinationId = null;
        }
 
        $relationship = Relationship::create([
            'type' => $handleStoreRelationshipRequest->get('type'),
            'directed' => $handleStoreRelationshipRequest->get('directed'),
            'source' => $sourceId,
            'destination' => $destinationId,
            'properties' => json_encode($handleStoreRelationshipRequest->get('properties')),
        ]);

        $relationship->nodes()->attach($sourceId);
        $relationship->nodes()->attach($destinationId);

        return $relationship;
    }
}